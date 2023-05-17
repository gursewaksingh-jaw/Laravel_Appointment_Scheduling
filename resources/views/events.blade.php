<h1 id="show-message"> </h1>
<script>
    Echo.channel('events').listen('RealTimeMessage', (e) => document.getElementById('show-message').innerHTML = " Hello World");
</script>
