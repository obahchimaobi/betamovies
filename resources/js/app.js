import './bootstrap';
import 'preline';

document.addEventListener("livewire:navigating", () => {
    HSStaticMethods.autoInit();
});

document.addEventListener("livewire:navigated", () => {
    HSStaticMethods.autoInit();
});