(() => {
    document.querySelectorAll('a[href^="http"], a[href^="//"]').forEach((link) => {
        let url = new URL(link, window.location.origin);
        if (url.hostname !== window.location.hostname) {
            link.target = "_blank";
        }
    });
})();
