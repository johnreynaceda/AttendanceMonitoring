import "./bootstrap";

import Alpine from "alpinejs";
import Focus from "@alpinejs/focus";
import autoAnimate from "@formkit/auto-animate";
import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
import NotificationsAlpinePlugin from "../../vendor/filament/notifications/dist/module.esm";
import moment from "@victoryoalli/alpinejs-moment";

Alpine.plugin(Focus);
Alpine.directive("animate", (el) => {
    autoAnimate(el);
});
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);
Alpine.plugin(moment);

window.Alpine = Alpine;

Alpine.start();
