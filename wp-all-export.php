/** for plugin wp-all-export
* function create date in ISO formats
* returns <generation_date>2022-09-17T21:17:37+03:00 </generation_date>
*/
function xml_current_date()
{	
	  date_default_timezone_set('Europe/Kiev');
    return date_format(date_create(date("Y-m-d H:i:s")), 'c');
}
