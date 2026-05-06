<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registry Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Poppins', sans-serif;
        }

        .header-section {
            background: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-bottom: 2px solid #e2e6ea;
        }

        .card {
            border-radius: 12px;
        }

        .table tbody tr:hover {
            background: #f1f7ff;
        }

        .btn-action {
            font-size: 0.85rem;
            padding: 5px 10px;
        }

        .btn-delete {
            background: transparent;
            color: #e74c3c;
            border: 1px solid #e74c3c;
        }

        .btn-delete:hover {
            background: #e74c3c;
            color: #fff;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header-section">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Student Registry System</h3>
            <small class="text-muted">CI4 CRUD Project</small>
        </div>
    </div>
</div>

<div class="container">

    <!-- ALERTS -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">

        <!-- LEFT: FORM -->
        <div class="col-md-4">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-user-plus"></i> Add Student</h5>

                    <form action="<?= base_url('student/store') ?>" method="post">

                        <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

                        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

                        <input type="text" name="course" class="form-control mb-3" placeholder="Course" required>

                        <button class="btn btn-success w-100">
                            <i class="fas fa-save"></i> Save
                        </button>

                    </form>
                </div>
            </div>

        </div>

        <!-- RIGHT: TABLE -->
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h5 class="mb-3"><i class="fas fa-table"></i> Student List</h5>

                    <!-- SEARCH BAR -->
                    <form method="get" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search student...">
                            <button class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="table-responsive">

                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if($students): ?>
                                    <?php $i = 1; foreach($students as $s): ?>

                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $s['name'] ?></td>
                                        <td><?= $s['email'] ?></td>
                                        <td><?= $s['course'] ?></td>

                                        <td>
                                            <div class="d-flex gap-2">

                                                <!-- EDIT -->
                                                <a href="<?= base_url('student/edit/'.$s['id']) ?>"
                                                   class="btn btn-warning btn-sm btn-action">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- DELETE -->
                                                <a href="<?= base_url('student/delete/'.$s['id']) ?>"
                                                   class="btn btn-delete btn-sm btn-action"
                                                   onclick="return confirm('Delete this record?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>

                                    <?php endforeach; ?>
                                <?php else: ?>

                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            No student records found.
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>