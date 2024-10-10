$(document).ready(function () { $(".checkfairpp").click(function () { $(this).closest(".carBoption").toggleClass("selected"), $(this).closest(".carBoption").find(".faredetail").toggle(), $(".fa-caret-down", this).toggleClass("fa-caret-up") }), $(".btn_modify").click(function () { $(".modfipagecab").toggle() }), $(".nav-tabs a").click(function (t) { t.preventDefault(), $(this).tab("show") }), $(".faresumm li input").click(function () { $(".faresumm li input:not(:checked)").closest("li").removeClass("active"), $(".faresumm li input:checked").closest("li").addClass("active") }), $(".faresumm li input:checked").closest("li").addClass("active"), $("#lodate").datepicker({ format: "dd/mm/yyyy", autoclose: true, startDate: "tommorow", todayHighlight: !0 }), $("#ostartdate").datepicker({ format: "dd/mm/yyyy", startDate: "tommorow", todayHighlight: !0 }), $("#oenddate").datepicker({ format: "dd/mm/yyyy", startDate: "tommorow", todayHighlight: !0 }), $("#busstartdate").datepicker({ format: "dd/mm/yyyy", startDate: "tommorow", todayHighlight: !0 }), $("#busenddate").datepicker({ format: "dd/mm/yyyy", startDate: "tommorow", todayHighlight: !0 }) });
// $(function () {
//     $("#from_out").daterangepicker({
//         startDate: moment().add(1, 'days'),
//         endDate: moment().add(2, 'days'),
//         minDate: moment(), // This sets the start date to today's date
//         locale: {
//             format: 'MM/DD/YYYY' // Date format
//         }
//     });

// });