<!DOCTYPE html>
<html>
<head>
    <title>Course Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary"> Course Management</h2>
    </div>

    <!-- SEARCH BAR -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="get" action="/courses" class="row g-2">
                <div class="col-md-10">
                    <input 
                        type="text" 
                        name="keyword" 
                        class="form-control"
                        placeholder="Search course or instructor..."
                        value="<?= $_GET['keyword'] ?? '' ?>">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary">
                        🔍 Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm">
        <div class="card-body">

            <?php if(!empty($courses)): ?>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Instructor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($courses as $course): ?>
                        <tr>
                            <td><?= $course['id'] ?? '' ?></td>
                            <td><?= $course['course_name'] ?? '' ?></td>
                            <td><?= $course['instructor'] ?? '' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="text-center text-muted py-3">
                    No results found
                </div>
            <?php endif; ?>

        </div>
    </div>

</div>

</body>
</html>