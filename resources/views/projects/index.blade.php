<!DOCTYPE html>
<html>
<head>
    <title>My Portfolio</title>
</head>
<body>
    <h1>My Projects</h1>
    @foreach ($projects as $project)
        <div>
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->description }}</p>
            <video width="640" height="360" controls>
                <source src="{{ asset('storage/' . $project->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endforeach
</body>
</html>
