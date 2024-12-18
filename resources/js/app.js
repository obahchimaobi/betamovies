import './bootstrap';
import 'preline';
// import 'flowbite';

document.addEventListener("livewire:navigating", () => {
    HSStaticMethods.autoInit();
});

document.addEventListener("livewire:navigated", () => {
    HSStaticMethods.autoInit();
});
