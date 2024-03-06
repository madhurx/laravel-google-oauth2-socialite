<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .container-fluid {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                position: relative;
            }

            .card {
                width: 500px;
                text-align: center;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .btn-sign-in {
                position: absolute;
                top: 20px;
                right: 20px;
            }

            .alert-container {
                position: absolute;
                bottom: 20px;
                right: 20px;
                z-index: 999;
            }

            .formal-heading {
                font-size: 1.75rem;
                /* Adjust font size as needed */
                font-weight: 600;
                margin-bottom: 10px;
                color: #555;
                /* Dark grey color */
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="container-fluid">
            @if(session('google_logged_in'))
            <a href="{{ route('auth.google.signOut') }}"
                class="btn btn-outline-dark btn-lg btn-sign-in">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-google" viewBox="0 0 16 16">
                    <path
                        d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                </svg>

                Sign out

            </a>
            @else
            <a href="{{ route('auth.google') }}" class="btn btn-outline-dark btn-lg btn-sign-in">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-google" viewBox="0 0 16 16">
                    <path
                        d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                </svg>

                Sign in

            </a>
            @endif
            <div class="card">
                <p class="formal-heading">Schedule an Interview</p>
                <form method="POST" action="{{ '#' }}">
                    @csrf
                    <div class="">

                        <div class="col">
                            <div class="mb-1">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description"
                                    class="form-control" required>

                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="time" class="form-label">Date and Time</label>
                                <input type="datetime-local" name="time" id="time"
                                    class="form-control" required>
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="organizer_email" class="form-label">Organizer
                                    Email</label>
                                <input type="email" name="organizer_email" id="organizer_email"
                                    class="form-control" required>
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="attendees_emails" class="form-label">Attendees Emails
                                    (comma-separated)</label>
                                <input type="text" name="attendees_emails" id="attendees_emails"
                                    class="form-control">
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="interview_mode" class="form-label">Interview
                                    Mode</label>
                                <select class="form-select" name="interview_mode"
                                    id="interview_mode" required>
                                    <option value="" selected disabled>Select interview Mode
                                    </option>
                                    <option value="telephonic">Telephonic</option>
                                    <option value="online">Online</option>
                                    <option value="in-person">In-person</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary">Schedule an
                                Interview</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="alert-container">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    @if (session()->has('responseData'))
                    <p>Meeting Link: <a href={{ session('responseData.meetingLink') }}
                            class="alert-link">{{
                            session('responseData.meetingLink') }}</a></p>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        </script>
    </body>

</html>
