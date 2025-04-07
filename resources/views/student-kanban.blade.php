@extends('layout')

@section('title', 'KANBAN VIEW')

@section('csrftoken')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('stylecss')

  <style>
    .kanban-board {
    overflow-x: auto;
    white-space: nowrap;
    min-height: 80vh;
    }

    .kanban-column {
    display: inline-block;
    vertical-align: top;
    white-space: normal;
    }

    .kanban-items {
    min-height: 70vh;
    }

    .kanban-item {
    cursor: move;
    }

    .kanban-item.dragging {
    opacity: 0.5;
    }
  </style>

@endsection

@section('logoutbtn')
  <div class="col-lg-3 text-right">
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="small btn btn-danger">LOGOUT</button>
    </form>
  </div>
@endsection

@section('navbar')
  <div class="mr-auto">
    <nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
      <li>
      <a href="{{ route('home')}}" class="nav-link text-left">Home</a>
      </li>
      <li>
      <a href="{{ route('studentform') }}" class="nav-link text-left">Add Student Data</a>
      </li>
      <li>
      <a href="{{ route('readrecords')}}" class="nav-link text-left">Read Students Records</a>
      </li>
      <li>
      <a href="{{ route('dashboard') }}" class="nav-link text-left">Dashboard</a>
      </li>
      <li class="has-children">
      <a class="nav-link text-left">Others</a>
      <ul class="dropdown">
        <li><a href="{{ route('student.kanban') }}">KanBan View</a></li>
        <li><a href="{{ route('marksentryform') }}">Marks Entry</a></li>
        <li><a href="{{ route('customchatbot') }}">Custom ChatBot</a></li>
      </ul>
      </li>
    </ul>
    </nav>
  </div>
@endsection

@section('main')
  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
      <h2 class="mb-0">Student Kanban Board</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
      </div>
    </div>
    </div>
  </div>

  <div class="custom-breadcrumns border-bottom">
    <div class="container">
    <a href="{{ route('home') }}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{ route('student.kanban') }}"><span class="current">Student Kanban View</span></a>
    </div>
  </div>

  <div class="site-section">
    <div class="container">




    <div class="container-fluid">
      <h1>Student Kanban Board</h1>

      <div class="row kanban-board">
      @foreach($statuses as $status)
      <div class="col-md-3 kanban-column">
      <div class="card">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">{{ $status }}</h5>
      </div>
      <div class="card-body kanban-items" data-status="{{ $status }}">
        @foreach($studentsByStatus[$status] as $student)
      <div class="kanban-item card mb-2" data-id="{{ $student->rollno }}" draggable="true">
      <div class="card-body">
      <h6 class="card-title">{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}
      </h6>
      <p class="card-text small">
      ROLL NO: {{ $student->rollno }}
      <!-- Add other fields you want to display -->
      </p>
      </div>
      </div>
    @endforeach
      </div>
      </div>
      </div>
    @endforeach
      </div>
    </div>




    </div>
  </div>

@endsection

@section('scriptcode')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.kanban-item');
    const columns = document.querySelectorAll('.kanban-items');

    let draggedItem = null;

    // Drag start
    items.forEach(item => {
      item.addEventListener('dragstart', function () {
      draggedItem = this;
      setTimeout(() => {
        this.classList.add('dragging');
      }, 0);
      });

      item.addEventListener('dragend', function () {
      this.classList.remove('dragging');
      });
    });

    // Drag over columns
    columns.forEach(column => {
      column.addEventListener('dragover', function (e) {
      e.preventDefault();
      const afterElement = getDragAfterElement(this, e.clientY);
      if (afterElement == null) {
        this.appendChild(draggedItem);
      } else {
        this.insertBefore(draggedItem, afterElement);
      }
      });
    });

    // Drop - update status
    columns.forEach(column => {
      column.addEventListener('drop', function () {
      const newStatus = this.dataset.status;
      const studentId = draggedItem.dataset.id;

      // Send AJAX request to update status
      fetch(`/student-kanban/${studentId}`, {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
        status: newStatus
        })
      })
        .then(response => response.json())
        .then(data => {
        if (!data.success) {
          alert('Error updating status');
          // Optionally revert the UI change
        }
        });
      });
    });

    function getDragAfterElement(container, y) {
      const draggableElements = [...container.querySelectorAll('.kanban-item:not(.dragging)')];

      return draggableElements.reduce((closest, child) => {
      const box = child.getBoundingClientRect();
      const offset = y - box.top - box.height / 2;
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child };
      } else {
        return closest;
      }
      }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
    });
    // window.location.reload();
  </script>
@endsection