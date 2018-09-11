@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css">

<style>
.datepicker,
.timepicker,
.datetimepicker {
  .form-control {
    background: #fff;
  }
}
</style>
@stop





<div class="form-group">
	<div class="input-group datetimepicker">
		<input
      style="display:hidden;"
      type="text"
      name="{{ $row->field }}"
      class="form-control"
      readonly
      value="{{ $dataTypeContent->{$row->field} }}"
    >
		<span class="input-group-addon">
			<span class="voyager-calendar"></span>
			+
			<span class="voyager-alarm-clock"></span>
		</span>
	</div>
</div>


@section('javascript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
var defaults = {
	calendarWeeks: true,
	showClear: true,
	showClose: true,
	allowInputToggle: true,
	useCurrent: false,
	ignoreReadonly: true,
	minDate: new Date(),
	toolbarPlacement: 'top',
	locale: 'en',
	icons: {
		time: 'voyager-alarm-clock',
		date: 'voyager-alarm-calendar',
		up: 'voyager-angle-up',
		down: 'voyager-angle-down',
		previous: 'voyager-angle-left',
		next: 'voyager-angle-right',
		today: 'voyager-check-circle',
		clear: 'voyager-trash',
		close: 'voyager-x'
	}
};

$(function() {
	var optionsDatetime = $.extend({}, defaults, {format:'YYYY-MM-DD HH:mm:ss'});
	$('.datetimepicker').datetimepicker(optionsDatetime);
});
</script>
@stop
