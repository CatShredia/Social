import { createPopper } from "@popperjs/core";
window.Popper = { createPopper };

import $ from "jquery";
window.$ = window.jQuery = $;

import "bootstrap";

import $tailwind from "tailwindcss";
window.$ = window.tailwind = $tailwind;
