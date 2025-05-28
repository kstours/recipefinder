function showToast(message, duration) {
    var toast = document.createElement("div");
    toast.className = "toast";
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(function () {
        toast.style.opacity = "0";
        setTimeout(function () {
            document.body.removeChild(toast);
        }, 1000);
    }, duration);
}