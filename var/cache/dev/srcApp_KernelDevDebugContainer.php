<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container8pLtwi9\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container8pLtwi9/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container8pLtwi9.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container8pLtwi9\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container8pLtwi9\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '8pLtwi9',
    'container.build_id' => '9594001d',
    'container.build_time' => 1567857607,
], __DIR__.\DIRECTORY_SEPARATOR.'Container8pLtwi9');
