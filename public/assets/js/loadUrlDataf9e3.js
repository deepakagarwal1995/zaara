let updateArr=[];const apiUrl="https://www.hirecab.net/api/get_cabdetails_static.php";function getLocalList(t,r,e){try{$.ajax({type:"POST",url:apiUrl,dataType:"json",data:{cityid:r,triptype:t},success:function(t){if(t&&t.success){var r=`<table class="fare_tbl2" cellpadding="0" cellspacing="0" border="0" width="100%">
    <thead><tr>
    <th>Vehicle Type</th>
    <th>8Hrs 80km</th>
    <th>12Hrs 120km</th>
    <th>Extra HR/Km</th>
    </tr></thead>
    <tbody>`;let a=[];t.result.forEach((t,r)=>{let e=a.findIndex(r=>r.car_id===t.car_id);e>-1&&"0"===t.round_trip?a[e]["8_hr_price"]=t.fix_price:e>-1&&"1"===t.round_trip&&(a[e]["12_hr_price"]=t.fix_price),-1===e&&"0"===t.round_trip?a.push({...t,"8_hr_price":t.fix_price}):-1===e&&"1"===t.round_trip&&a.push({...t,"12_hr_price":t.fix_price})}),a.forEach(t=>{r+="<tr>",t.car_name&&(r+="<td>",r+=t.car_name,r+="</td>"),t["8_hr_price"]&&(r+="<td>",r+=t["8_hr_price"],r+="</td>"),t["12_hr_price"]&&(r+="<td>",r+=t["12_hr_price"],r+="</td>"),t.per_km&&t.km_chrg&&(r+="<td>",r+=parseFloat(t.per_km).toFixed(0)+"/"+parseFloat(t.km_chrg).toFixed(0),r+="</td>"),r+="</tr>"}),r+="</tbody></table>",$(e).html(r),$(e).show()}else t.success||t.statusCode,alert(t.message)},error:function(t){console.log("Something Went Wrong. Error - "+t.error.statusText),$(e).html("Unable to load data."),$(e).show()}})}catch(a){console.log("Something Went Wrong. Error - "+a)}}function getoutstationList(t,r,e,a){try{$.ajax({type:"POST",url:apiUrl,dataType:"json",data:{cityid:r,triptype:t},success:function(t){if(t&&t.success){var r=`<table class="fare_tbl2" cellpadding="0" cellspacing="0" border="0" width="100%">
        <thead>
          <tr>
            <th>Car Type</th>
            <th>Base Km</th>
            <th>Rate/Km</th>
            <th>DA</th>
          </tr>
        </thead>
        <tbody>`;t.result.forEach(t=>{console.log(t),r+="<tr>",t.car_name&&(r+="<td>",t.url&&t.url_title&&(r+=`<a href='${t.url}' title='${t.url_title}'>`),t.url&&t.url_title?r+=`${t.car_name}</a> - (${t.tot_seat} Driver)`:r+=`${t.car_name} - (${t.tot_seat} Driver)`,r+="</td>"),t.min_km_day&&(r+="<td>",r+=`${t.min_km_day}/D`,r+="</td>"),t.km_chrg&&(r+="<td>",r+=`&#8377; ${t.km_chrg}/km`,r+="</td>"),t.driver_allw&&(r+="<td>",r+=`&#8377; ${t.driver_allw}/D`,r+="</td>"),r+="</tr>"}),r+="</tbody></table>",$(e).html(r),$(e).show()}else t.success||t.statusCode,alert(t.message)},error:function(t){console.log("Something Went Wrong. Error - "+t.error.statusText),$(e).html("Unable to load data."),$(e).show()}})}catch(i){console.log("Something Went Wrong. Error - "+i)}}function getLuxuryList(t,r,e,a){try{$.ajax({type:"POST",url:apiUrl,dataType:"json",data:{cityid:r,triptype:t},success:function(t){if(t&&t.success){var r=`<table cellpadding="0" class="fare_tbl2" cellspacing="0" width="70%">
    <thead>
      <tr>
        <th>Source</th>
        <th>Car Type</th>
        <th>Local 8hrs 80km</th>
        <th>Outstation/Km</th>
      </tr>
    </thead>
    <tbody>`;t.result.forEach(t=>{console.log(t),r+="<tr>",r+="<td>",r+=a,r+="</td>",t.car_name&&(r+="<td>",t.url&&t.url_title&&(r+=`<a href='${t.url}' title='${t.url_title}'>`),t.url&&t.url_title?r+=`${t.car_name}</a>`:r+=`${t.car_name}`,r+="</td>"),t.fix_price&&(r+="<td>&#8377; ",r+=`${t.fix_price}`,r+="</td>"),t.km_chrg&&(r+="<td>&#8377; ",r+=`${t.km_chrg}/km`,r+="</td>"),r+="</tr>"}),r+=`<tr>
<td colspan="4">For luxury car booking in Mumbai Call on: <strong>+91-9702545454</strong></td>
</tr>`,r+="</tbody></table>",$(e).html(r),$(e).show()}else t.success||t.statusCode,alert(t.message)},error:function(t){console.log("Something Went Wrong. Error - "+t.error.statusText),$(e).html("Unable to load data."),$(e).show()}})}catch(i){console.log("Something Went Wrong. Error - "+i)}}function getBusList(t,r,e,a){try{$.ajax({type:"POST",url:apiUrl,dataType:"json",data:{cityid:r,triptype:t},success:function(t){if(t&&t.success){var r,a="car_id";let i=(r=t.result).reduce(function(t,r){return(t[r[a]]=t[r[a]]||[]).push(r),t},{});var l=`<table cellpadding="0"  cellspacing="0" border="0">
     <thead>
       <tr>
         <th title="Seater">Seater</th>
         <th title="Base Km">Base KM</th>
         <th title="Non AC">Non AC</th>
         <th title="AC">AC</th>
         <th title="Driver Allowance">DA</th>
         <th title="Permit">Permit</th>
       </tr>
     </thead>
     <tbody>`;for(let s in i){let o=i[s];l+="<tr>",o[0].car_name&&(l+="<td>",l+=`${o[0].car_name}`,l+="</td>"),o[1].min_km_day&&(l+="<td>",l+=`${o[1].min_km_day}/D`,l+="</td>");let c=o.find(t=>"1"===t.vehicle_type);c.km_chrg&&(l+="<td>&#8377; ",l+=`${c.km_chrg}`,l+="</td>");let d=o.find(t=>"0"===t.vehicle_type);d.km_chrg&&(l+="<td>&#8377; ",l+=`${d.km_chrg}`,l+="</td>"),o[1].driver_allw&&(l+="<td>&#8377; ",l+=`${o[1].driver_allw}/D`,l+="</td>"),o[1].permit&&(l+="<td>&#8377; ",l+=`${o[1].permit}/D`,l+="</td>"),l+="</tr>"}l+="</tbody></table>",$(e).html(l),$(e).show()}else t.success||t.statusCode,alert(t.message)},error:function(t){console.log("Something Went Wrong. Error - "+t.error.statusText),$(e).html("Unable to load data."),$(e).show()}})}catch(i){console.log("Something Went Wrong. Error - "+i)}}function loadData(){var t=$("meta[property=table-data-params]").attr("content");if(t=t?.split(","))try{switch(t[0]){case"local":if(!(t[0]&&t[1]&&t[2]))throw"Required params missing";getLocalList(t[0],t[1],t[2]);break;case"outstation":if(!(t[0]&&t[1]&&t[2]&&t[3]))throw"Required params missing";getoutstationList(t[0],t[1],t[2],t[3]);break;case"luxury":getLuxuryList(t[0],t[1],t[2],t[3]);break;case"bus":getBusList(t[0],t[1],t[2],t[3])}}catch(r){console.log("Something Went Wrong. Error - "+r)}}loadData();