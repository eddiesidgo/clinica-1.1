@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

@php
$configData = Helper::appClasses();
@endphp

<!-- Agrega esto en la sección <head> de tu layout -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>


@isset($configData["layout"])
@include(
  ($configData["layout"] === 'horizontal') 
  ? 'layouts.horizontalLayout' 
  : (($configData["layout"] === 'blank') 
    ? 'layouts.blankLayout' 
    : 'layouts.contentNavbarLayout')
)
@endisset
