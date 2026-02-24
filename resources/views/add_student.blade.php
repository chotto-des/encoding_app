<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Student</title>
	@vite(['resources/css/site_header.css', 'resources/css/add_student.css'])
</head>
<body>
	@include('partials.site_header', ['active' => 'add-student', 'fullWidth' => true])

	<main class="add-main">
		<header class="add-page-header">
			<h1 class="add-title">Student Records</h1>
			<p class="add-subtitle">Manage student information and records</p>
		</header>

		<section class="form-card">
			<h2 class="form-heading">Add New Student</h2>

			<form class="form-grid">
				<div class="form-group">
					<label for="first_name" class="form-label">First Name <span class="required">*</span></label>
					<input id="first_name" type="text" placeholder="Juan" class="form-input">
				</div>

				<div class="form-group">
					<label for="middle_name" class="form-label">Middle Name</label>
					<input id="middle_name" type="text" placeholder="Santos" class="form-input">
				</div>

				<div class="form-group col-full">
					<label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
					<input id="last_name" type="text" placeholder="Dela Cruz" class="form-input">
				</div>

				<div class="form-group">
					<label for="gender" class="form-label">Gender <span class="required">*</span></label>
					<select id="gender" class="form-select">
						<option value="">Select Gender</option>
						<option>Female</option>
						<option>Male</option>
					</select>
				</div>

				<div class="form-group">
					<label for="grade_level" class="form-label">Grade Level <span class="required">*</span></label>
					<select id="grade_level" class="form-select">
						<option value="">Select Grade Level</option>
						<option>Grade 7</option>
						<option>Grade 8</option>
						<option>Grade 9</option>
						<option>Grade 10</option>
					</select>
				</div>

				<div class="form-group col-full">
					<label for="elementary_school" class="form-label">Elementary School <span class="required">*</span></label>
					<input id="elementary_school" type="text" placeholder="San Fernando Elementary School" class="form-input">
				</div>

				<div class="form-group">
					<label for="province" class="form-label">Province <span class="required">*</span></label>
					<select id="province" class="form-select">
						<option>Pampanga</option>
					</select>
				</div>

				<div class="form-group">
					<label for="municipality" class="form-label">Municipality <span class="required">*</span></label>
					<select id="municipality" class="form-select">
						<option value="">Select Municipality</option>
						<option>San Fernando</option>
						<option>Angeles City</option>
					</select>
				</div>

				<div class="form-group col-full">
					<label for="town_barangay" class="form-label">Town/Barangay <span class="required">*</span></label>
					<select id="town_barangay" class="form-select">
						<option value="">Select Barangay</option>
						<option>Del Pilar</option>
						<option>Balibago</option>
						<option>San Jose</option>
						<option>Sindalan</option>
						<option>Lara</option>
						<option>Dolores</option>
						<option>Maimpis</option>
					</select>
				</div>

				<div class="btn-row">
					<button type="button" class="btn-submit">Add Student</button>
					<button type="button" class="btn-cancel">Cancel</button>
				</div>
			</form>
		</section>
	</main>
</body>
</html>
