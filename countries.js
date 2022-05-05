var country_arr = new Array("Select","India","Sri Lanka");

var s_a = new Array();
s_a[0]="";
s_a[1]="";
s_a[2]="Andaman and Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Daman and Diu|Delhi|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Orissa|Pondicherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Tripura|Uttar Pradesh|Uttaranchal|West Bengal";
s_a[3]="Central|Eastern|North Central|North Eastern|North Western|Northern|Sabaragamuwa|Southern|Uva|Western";

function print_country(country_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(country_id);
	var x, i=0;
	for(x in country_arr){
		option_str.options[i++] = new Option(country_arr[x],country_arr[x]);
	}
}

function print_state(state_id, state_index){
	var option_str = document.getElementById(state_id);
	var x, i=0; state_index++;
	var state_arr = s_a[state_index].split("|");
	for(x in state_arr){
            option_str.options[i++] = new Option(state_arr[x],state_arr[x]);
	}
}