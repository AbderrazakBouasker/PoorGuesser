import { Viewer } from "mapillary-js";

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('mapillary-view');
    const viewer = new Viewer({
        accessToken: "6211217542287389",
        container: container,
    });
});