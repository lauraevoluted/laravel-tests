<x-utils.edit-button :href="route('admin.pages.edit', ['page' => $page])" />
<a class="btn btn-sm btn-secondary" href="{{ route('frontend.pages.view', ['page' => $page]) }}" target="_blank">
    <i class="fas fa-eye"></i>
    @lang('View')
</a>
