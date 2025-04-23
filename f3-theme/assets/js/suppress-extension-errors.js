window.addEventListener('unhandledrejection', function (event) {
    const message = event?.reason?.message || '';
    if (message.includes("Receiving end does not exist")) {
        event.preventDefault();
    }
});
