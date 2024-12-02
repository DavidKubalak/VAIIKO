<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/Users/david_mac/Desktop/VAIKO/Ideas/resources/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Ideas</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark sticky-top">
    <div class="container">
        <a class="navbar-logo-text" href="index.html">Ideas</a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item d-lg-none"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item d-lg-none"><a class="nav-link" href="feed.html">Feed</a></li>
                <li class="nav-item d-lg-none"><a class="nav-link" href="terms.html">Terms</a></li>
                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container py-4">
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="card overflow-hidden">
                <div class="card-body pt-3">
                    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                        <li class="nav-item">
                            <a class="side-bar-text" href="index.html">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="side-bar-text" href="feed.html">
                                <span>Feed</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="side-bar-text" href="terms.html">
                                <span>Terms</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="view-profile text-center py-2">
                    <a class="btn btn-link"
                       href="#">View Profile </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <h4> Share yours ideas </h4>
            <div class="row">
                <form>
                    <div class="mb-3">
                        <label for="content"></label>
                        <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                    </div>
                    <div class="d-flex">
                        <button class="ms-1 btn btn-dark">Share Idea</button>
                    </div>
                </form>
            </div>

            <div class="card mt-3">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=David+Kubalak&background=random&size=128"
                                 alt="David">
                            <div>
                                <h5 class="mb-0 username-main"><a>David Kubalak</a></h5>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a class="ms-1 btn btn-view btn-sm" href="#">View</a>
                            <a class="ms-1 btn btn-edit btn-sm" href="#">Edit</a>
                            <button class="ms-1 btn btn-delete btn-sm">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="fs-6 fw-light text-muted mb-0">Content of the first idea from user David.</p>
                    <div>
                        <form>
                            <div class="mt-0 mb-3">
                                <label for="post-comment"></label>
                                <textarea id="post-comment" class="fs-6 form-control" rows="1"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-post btn-sm"> Post Comment </button>
                            </div>
                        </form>
                        <hr>

                        <!-- Comment Section -->
                        <div class="d-flex align-items-start">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Janka+K&background=random&size=128" alt="Janka Smith">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Janka</h6>
                                    <small class="fs-6 fw-light text-muted">5 minutes ago</small>
                                </div>
                                <p class="fs-6 mb-3 fw-light">This is a comment from Janka.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mt-3">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Marek&background=random&size=128" alt="Marek">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Marek</h6>
                                    <small class="fs-6 fw-light text-muted">15 minutes ago</small>
                                </div>
                                <p class="fs-6 mb-3 fw-light">This is a comment from Marek.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mt-3">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Jaro&background=random&size=128" alt="Jaro">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Jaro</h6>
                                    <small class="fs-6 fw-light text-muted">24 minutes ago</small>
                                </div>
                                <p class="fs-6 mb-3 fw-light">This is a comment from Jaro.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mt-3">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Patrik&background=random&size=128" alt="Patrik">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Patrik</h6>
                                    <small class="fs-6 fw-light text-muted">31 minutes ago</small>
                                </div>
                                <p class="fs-6 mb-3 fw-light">This is a comment from Patrik.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=David+Kubalak&background=random&size=128"
                                 alt="David">
                            <div>
                                <h5 class="mb-0 username-main"><a>David Kubalak</a></h5>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a class="ms-1 btn btn-view btn-sm" href="#">View</a>
                            <a class="ms-1 btn btn-edit btn-sm" href="#">Edit</a>
                            <button class="ms-1 btn btn-delete btn-sm">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="fs-6 fw-light text-muted mb-0">Content of the second idea from user David.</p>
                    <div>
                        <form>
                            <div class="mt-0 mb-3">
                                <label for="post-comment-2"></label>
                                <textarea id="post-comment-2" class="fs-6 form-control" rows="1"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-post btn-sm"> Post Comment </button>
                            </div>
                        </form>
                        <hr>

                        <!-- Comment Section -->
                        <div class="d-flex align-items-start mt-3">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Patrik&background=random&size=128" alt="Patrik">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Patrik</h6>
                                    <small class="fs-6 fw-light text-muted">12 minutes ago</small>
                                </div>
                                <p class="fs-6 mb-3 fw-light">This is a comment from Patrik.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mt-3">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Jaro&background=random&size=128" alt="Jaro">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Jaro</h6>
                                    <small class="fs-6 fw-light text-muted">15 minutes ago</small>
                                </div>
                                <p class="fs-6 mb-3 fw-light">This is a comment from Jaro.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 d-none d-lg-block">
            <div class="card p-2">
                <p class="fw-bold">Top Users</p>
                <div class="d-flex align-items-center mb-3">
                    <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Janka+K&background=random&size=128" alt="Janka K">
                    <p class="mb-0">Janka</p>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Marek&background=random&size=128" alt="Marek">
                    <p class="mb-0">Marek</p>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Patrik&background=random&size=128" alt="Patrik">
                    <p class="mb-0">Patrik</p>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://ui-avatars.com/api/?name=Jaro&background=random&size=128" alt="Jaro">
                    <p class="mb-0">Jaro</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
