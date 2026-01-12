import { editor } from "./editorSetup";


export function initVisualEditor(containerSelector = '#editor') {
    const container = document.querySelector(containerSelector);
    if (!container) return;
    editor.defineElement()
}
