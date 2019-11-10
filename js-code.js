// CORS POLICY !!
      //fetch('http://www.google.com/basepages/producttype/taxonomy-with-ids.tr-TR.txt')
      fetch("google-product-id-TR.txt")
        .then(response => response.text())
        .then(data => {
          let result = data.split("\n");
          result.shift();
          let keys = [];
          let values = [];
          for (let i = 0; i < result.length; i++) {
            // Keys
            let key = result[i].search("-");
            keys.push(result[i].slice(0, key - 1));
            // Values
            let value = result[i].lastIndexOf(">");
            if (value == -1) {
              let val1 = result[i].search("-") + 1;
              let val2 = result[i].length;
              values.push(result[i].slice(val1, val2));
            } else {
              let val2 = result[i].length;
              values.push(result[i].slice(value + 2, val2));
            }
          }
          // new array and create table
          let googleProductID = {};
          let table = '<table id="table">';
          for (let i in keys) {
            googleProductID[keys[i]] = values[i];
            table += `<tr>
                <td>${keys[i]}</td>
                <td>-</td>
                <td>${values[i]}</td>
              </tr>`;
          }
          table += "</table>";
          document.getElementById("tableDiv").innerHTML = table;
          // form search
          func = () => {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("product");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            table.style.display = "block";
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[2];
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "block";
              } else {
                tr[i].style.display = "none";
              }
            }
            if (input.value == "") {
              table.style.display = "none";
            }
          };
          //console.log(googleProductID);
        })
        .catch(err => console.log(err));
