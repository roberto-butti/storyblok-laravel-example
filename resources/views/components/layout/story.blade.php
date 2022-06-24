<html>
    <head>
        <title>{{ $title ?? 'Storyblok Demo' }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--link href="https://cdn.jsdelivr.net/npm/daisyui@2.4.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script-->
        <link href="/css/main.css" rel="stylesheet" type="text/css" /       >

        <!--link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet" /-->
    </head>
    <body class="landing is-preload">
        {{ $slot }}
        		<!-- Scripts -->
			<script src="/js/jquery.min.js"></script>
			<script src="/js/jquery.scrollex.min.js"></script>
			<script src="/js/jquery.scrolly.min.js"></script>
			<script src="/js/browser.min.js"></script>
			<script src="/js/breakpoints.min.js"></script>
			<script src="/js/util.js"></script>
			<script src="/js/main.js"></script>

        <script src="https://app.storyblok.com/f/storyblok-v2-latest.js"></script>

        <script type="text/javascript">
            const storyblokInstance = new StoryblokBridge()
            storyblokInstance.on('change', () => {
                console.log("SAVED PAGE");
                window.location.reload(true);
            });
            storyblokInstance.on('published', () => {
                console.log("PUBLISHED PAGE");
                window.location.reload(true);
            });
            storyblokInstance.on('input', (payload) => {
                // addComments is not required anymore
                console.log("input PAGE", payload);
            })

  </script>
    </body>
</html>
