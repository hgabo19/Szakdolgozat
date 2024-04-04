<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-action-color border border-transparent rounded-md font-semibold text-base text-white dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-action-hover focus:bg-gray-700 dark:focus:bg-action-hover active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
