<html>
    <head>
        <title>{{ $title ?? 'Storyblok Demo' }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.4.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet" />
    </head>
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
        {{ $slot }}
    </body>
</html>