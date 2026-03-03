<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Records</title>
	 @vite(['resources/css/home.css', 'resources/css/site_header.css','resources/css/site_footer.css'])
</head>
<body>
	@include('partials.site_header', ['active' => 'home', 'fullWidth' => true])

	<main class="home-main">

		<header class="page-header">
			<div>
				<h1 class="page-title">Student Records</h1>
				<p class="page-subtitle">Manage student information and records.</p>
			</div>

			<a href="/add-student" class="btn-add-student">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952l-1.66-2.117a5.25 5.25 0 1 0-8.172 0l-1.66 2.117A9.336 9.336 0 0 0 14.375 19.5c.9 0 1.77-.127 2.625-.372ZM15 10.5a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
					<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5h3m-1.5-1.5v3" />
				</svg>
				Add New Student
			</a>
		</header>

		<section class="table-card">
			<div class="table-wrapper">
				<table class="student-table">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Gender</th>
							<th>Elementary School</th>
							<th>Address</th>
							<th>Grade Level</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse($students as $student)
						<tr>
							<td>{{ $student->full_name }}</td>
							<td>{{ $student->gender }}</td>
							<td>{{ $student->elementary_school }}</td>
							<td class="address">
								{{ $student->barangay }}, {{ $student->municipality }}<br>
								{{ $student->province }}
							</td>
       						<td><span class="grade-badge">{{ $student->gradeLevel->grade_level_name ?? 'N/A' }}</span></td>
							<td>
								<div class="action-btns">
									<a href="{{ route('students.edit', $student) }}" class="btn-edit" aria-label="Edit">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="m16.862 3.487 3.651 3.651M4.5 19.5l4.301-.956a2.25 2.25 0 0 0 1.08-.591L20.513 7.322a2.25 2.25 0 0 0 0-3.182l-.653-.653a2.25 2.25 0 0 0-3.182 0L6.047 14.119a2.25 2.25 0 0 0-.591 1.08L4.5 19.5Z" />
										</svg>
									</a>

									<form id="delete-form-{{ $student->id }}" action="{{ route('students.destroy', $student) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="button" class="btn-delete" aria-label="Delete"
									onclick="openDeleteModal('{{ $student->id }}', '{{ $student->full_name }}')">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.167-2.087-2.203a51.964 51.964 0 0 0-3.826 0c-1.178.036-2.087 1.022-2.087 2.203v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
										</svg>
									</button>
									</form>
								</div>
							</td>
						</tr>
						 @empty
       						 <tr>
            					<td colspan="6" style="text-align:center; padding: 2rem; color: #94a3b8;">
              						No students found.
            					</td>
        					</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</section>
	</main>

	@if(session('success'))
<div id="success-modal" class="modal-overlay active" onclick="closeSuccessModal()">
	<div class="modal-box" onclick="event.stopPropagation()">
		<div class="modal-header">
			<h3 class="modal-title">Success</h3>
		</div>
		<div class="modal-body">
			<p class="modal-message">{!! session('success') !!}</p>
			<p style="font-size:0.78rem; color:#94a3b8; margin-top:0.5rem;">Click anywhere to continue</p>
		</div>
	</div>
</div>
@endif

<div id="delete-modal" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3 class="modal-title">Delete Student</h3>
        </div>
        <div class="modal-body">
            <p class="modal-message">Are you sure you want to delete</p>
            <p class="modal-student-name" id="modal-student-name"></p>
            <div class="modal-actions">
                <button type="button" onclick="closeDeleteModal()" class="btn-modal-cancel">Cancel</button>
                <button type="button" onclick="submitDelete()" class="btn-modal-delete">Delete</button>
            </div>
        </div>
    </div>
</div>

	<script>
		function closeSuccessModal() {
			const m = document.getElementById('success-modal');
			if (m) m.classList.remove('active');
		}

		let currentFormId = null;

		function openDeleteModal(id, name) {
			currentFormId = id;
			document.getElementById('modal-student-name').textContent = name + '?';
			document.getElementById('delete-modal').classList.add('active');
		}

		function closeDeleteModal() {
			currentFormId = null;
			document.getElementById('delete-modal').classList.remove('active');
		}

		function submitDelete() {
			if (currentFormId) {
				document.getElementById('delete-form-' + currentFormId).submit();
			}
		}
	</script>

@include('partials.site_footer')
</body>
</html>
