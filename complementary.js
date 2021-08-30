/*Usage for products as complementary functions*/ 

console.log('Successfully opened complementary.js');

var selection;
var table_count;
var col_count;
function selects(s) {
    selection = s;
}

function searchBlock(item, display_item, filter) {
    if (item) {
        var txtValue = item.textContent || item.innerText;
        if (txtValue.toLowerCase().indexOf(filter) > -1){
            display_item.style.display="";
        }
        else {
            display_item.style.display="none";
        }
    }
}

function searchBlockBoolean(item, display_bool, filter) {
    if (item) {
        var txtValue = item.textContent || item.innerText;
        if (txtValue.toLowerCase().indexOf(filter) > -1){
            return 1;
        }
        else {
            return 0;
        }
    }
}

function sort(){
    var input, filter, tables, trs, tds, s;
    input = document.getElementById("search");
    filter = input.value.toLowerCase();
    /*Change the table count if anything added*/
    table_count = 24;
    col_count = 5;
    tables = new Array(table_count);
    trs = new Array(table_count);
    for (var i = 0; i < tables.length; i++){
        s = "table_" + (i+1).toString();
        /*console.log(s);*/
        tables[i] = document.getElementById(s);
        trs[i] = tables[i].getElementsByTagName("tr");
        /*if j == 0, the tr inside thead will be considered in the below functions*/
        for (var j = 1; j < trs[i].length; j++){
            if (selection == 5) {
                console.log('success selection');
                tds = trs[i][j].getElementsByTagName("td");
                bool_count = 0;
                for (var k = 0; k < tds.length; k++){
                    bool_count += searchBlockBoolean(tds[k], trs[i][j], filter);
                }
                if (bool_count == 0){
                    trs[i][j].style.display = 'none';
                }
                else {
                    trs[i][j].style.display = '';
                }
            }
            else {
                tds = trs[i][j].getElementsByTagName("td")[selection];
                searchBlock(tds, trs[i][j], filter);
            }

            /*console.log(i,j);*/
            /*
            tds = trs[i][j].getElementsByTagName("td")[selection];
            if (tds) {
                var txtValue = tds.textContent || tds.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1){
                    trs[i][j].style.display="";
                }
                else {
                    trs[i][j].style.display="none";
                }
            }
            */
        }
    }
    console.log("successful search");
}

function sortSmall(){
    //input id: search-small
    return null;
}