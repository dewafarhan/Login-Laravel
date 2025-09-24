@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Staff Dashboard</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Jam Digital dan Absensi -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daily Attendance</h3>
                        </div>
                        <div class="card-body text-center">
                            <h4>{{ now()->format('l, d F Y') }}</h4>
                            <h2 id="clock" class="mb-3">00:00:00</h2>
                            <form method="POST" action="#">
                                @csrf
                                <button type="button" class="btn btn-success btn-lg mr-2" id="btn-clock-in">Clock In</button>
                                <button type="button" class="btn btn-danger btn-lg" id="btn-clock-out">Clock Out</button>
                            </form>
                            <div id="attendance-message" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <!-- Profil -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">My Profile</h3>
                        </div>
                        <div class="card-body">
                            <strong>Name:</strong> {{ auth()->user()->name }}<br>
                            <strong>Email:</strong> {{ auth()->user()->email }}<br>
                            <strong>Role:</strong> {{ auth()->user()->role }}<br>
                            <strong>Status:</strong> {{ auth()->user()->status }}<br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Daftar Tugas -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">My Tasks</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group" id="task-list">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Example Task 1
                                    <span>
                                        <button class="btn btn-sm btn-success btn-done">Done</button>
                                        <button class="btn btn-sm btn-danger btn-delete">Delete</button>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Example Task 2
                                    <span>
                                        <button class="btn btn-sm btn-success btn-done">Done</button>
                                        <button class="btn btn-sm btn-danger btn-delete">Delete</button>
                                    </span>
                                </li>
                            </ul>
                            <form id="add-task-form" class="mt-3 d-flex">
                                <input type="text" class="form-control" id="new-task" placeholder="Add new task..." required>
                                <button type="submit" class="btn btn-primary ms-2">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
// Jam Digital
function updateClock() {
    const now = new Date();
    const time = now.toLocaleTimeString();
    document.getElementById('clock').textContent = time;
}
setInterval(updateClock, 1000);
updateClock();

// Dummy Absensi
document.getElementById('btn-clock-in').onclick = function() {
    document.getElementById('attendance-message').innerHTML = '<span class="badge bg-success">Clock In Success at ' + (new Date()).toLocaleTimeString() + '</span>';
}
document.getElementById('btn-clock-out').onclick = function() {
    document.getElementById('attendance-message').innerHTML = '<span class="badge bg-danger">Clock Out Success at ' + (new Date()).toLocaleTimeString() + '</span>';
}

// Task List (Dummy, client-side only)
document.getElementById('add-task-form').onsubmit = function(e) {
    e.preventDefault();
    let taskText = document.getElementById('new-task').value.trim();
    if(taskText.length === 0) return;
    let li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between align-items-center';
    li.innerHTML = taskText + '<span><button class="btn btn-sm btn-success btn-done">Done</button> <button class="btn btn-sm btn-danger btn-delete">Delete</button></span>';
    document.getElementById('task-list').appendChild(li);
    document.getElementById('new-task').value = '';
};
document.getElementById('task-list').onclick = function(e) {
    if(e.target.classList.contains('btn-delete')) {
        e.target.closest('li').remove();
    }
    if(e.target.classList.contains('btn-done')) {
        e.target.closest('li').classList.toggle('list-group-item-success');
    }
};
</script>
@endsection
