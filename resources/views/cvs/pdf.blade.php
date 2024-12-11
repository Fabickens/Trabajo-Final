<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum de {{ $cv->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .section-title {
            color: #007bff;
            font-weight: bold;
            margin-top: 20px;
            border-bottom: 2px solid #007bff;
        }
        .content {
            padding: 20px;
        }
        .info-row {
            margin-bottom: 10px;
        }
        .info-row span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Currículum Vitae</h1>
        <p>{{ $cv->name }}</p>
    </div>

    <div class="content">
        <h2 class="section-title">Información Personal</h2>
        <div class="info-row">
            <span>Nombre:</span> {{ $cv->name }}
        </div>
        <div class="info-row">
            <span>Email:</span> {{ $cv->email }}
        </div>

        <h2 class="section-title">Educación</h2>
        <p>{{ $cv->education }}</p>

        <h2 class="section-title">Experiencia Laboral</h2>
        <p>{{ $cv->experience }}</p>

        <h2 class="section-title">Habilidades</h2>
        <ul>
            @foreach (explode(',', $cv->skills) as $skill)
                <li>{{ trim($skill) }}</li>
            @endforeach
        </ul>

        <h2 class="section-title">Idiomas</h2>
        <ul>
            @foreach (explode(',', $cv->languages) as $language)
                <li>{{ trim($language) }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
