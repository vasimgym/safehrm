<?php include("header.php");?>
<script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	submitHandler: function() {
		alert("submitted!");
	}
});
$.validator.messages.max = jQuery.format("Your totals musn't exceed {0}!");

$.validator.addMethod("quantity", function(value, element) {
	return !this.optional(element) && !this.optional($(element).parent().prev().children("select")[0]);
}, "Please select both the item and its amount.");

$().ready(function() {
	$("#orderform").validate({
		errorPlacement: function(error, element) {
			error.appendTo( element.parent().next() );
		},
		highlight: function(element, errorClass) {
			$(element).addClass(errorClass).parent().prev().children("select").addClass(errorClass);
		}
	});
	
	var template = jQuery.format($("#template").val());
	function addRow() {
		$(template(i++)).appendTo("#orderitems tbody");
	}
	
	var i = 1;
	// start with one row
	addRow();
	// add more rows on click
	$("#add").click(addRow);
	
	// check keyup on quantity inputs to update totals field
	$("#orderform").delegate("keyup", "input.quantity", function(event) {
		var totals = 0;
		$("#orderitems input.quantity").each(function() {
			totals += +this.value;
		});
		$("#totals").attr("value", totals).valid();
	});
	
});
</script>

<style type="text/css">
form.cmxform { width: 50em; }
em.error {
  background:url("images/unchecked.gif") no-repeat 0px 0px;
  padding-left: 16px;
}
em.success {
  background:url("images/checked.gif") no-repeat 0px 0px;
  padding-left: 16px;
}

form.cmxform label.error {
	margin-left: auto;
	width: 250px;
}
form.cmxform input.submit {
	margin-left: 0;
}
em.error { color: black; }
#warning { display: none; }
select.error {
	border: 1px dotted red;
}
</style>

</head>
<body>

<h1 id="banner"><a href="http://bassistance.de/jquery-plugins/jquery-plugin-validation/">jQuery Validation Plugin</a> Demo</h1>
<div id="main">

<textarea style="display:none" id="template">
	<tr>
		<td>
			<label>{0}. Item</label>
		</td>
		<td class='type'>
			<select name="item-type-{0}">
				<option value="">Select...</option>
				<option value="0">Learning jQuery</option>
				<option value="1">jQuery Reference Guide</option>
				<option value="2">jQuery Cookbook</option>
				<option vlaue="3">jQuery In Action</option>
				<option value="4">jQuery For Designers</option>
			</select>
		</td>
		<td class='quantity'>
			<input size='4' class="quantity" min="1" id="item-quantity-{0}" name="item-quantity-{0}" />
		</td>
		<td class='quantity-error'></td>
	</tr>
	
	<tr>
		<td>
			<label>{0}. Item</label>
		</td>
		<td class='type'>
			<select name="item-type-{0}">
				<option value="">Select...</option>
				<option value="0">Learning jQuery</option>
				<option value="1">jQuery Reference Guide</option>
				<option value="2">jQuery Cookbook</option>
				<option vlaue="3">jQuery In Action</option>
				<option value="4">jQuery For Designers</option>
			</select>
		</td>
		<td class='quantity'>
			<input size='4' class="quantity" min="1" id="item-quantity-{0}" name="item-quantity-{0}" />
		</td>
		<td class='quantity-error'></td>
	</tr>
</textarea>

<form id="orderform" class="cmxform" method="get" action="foo.html">
	<h2 id="summary"></h2>
	
	<fieldset>
		<legend>Example with custom methods and heavily customized error display</legend>
		<table id="orderitems">
			<tbody>
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"><label>Totals (max 25)</label></td>
					<td class="totals"><input id="totals" name="totals" value="0" max="25" readonly="readonly" size='4' /></td>
					<td class="totals-error"></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td><input class="submit" type="submit" value="Submit"/></td>
				</tr>
			</tfoot>
		</table>
	</fieldset>
</form>

<button id="add">Add another input to the form</button>

<h1 id="warning">Your form contains tons of errors! Please try again.</h1>

<p><a href="index.html">Back to main page</a></p>

</div>