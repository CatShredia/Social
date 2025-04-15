import { createPopper } from "@popperjs/core";
window.Popper = { createPopper };

import $ from "jquery";
window.$ = window.jQuery = $;

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
