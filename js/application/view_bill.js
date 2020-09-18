 function PrintDiv() {    
       var divToPrint = $('.card-body');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.html() + '</html>');
        popupWin.document.close();
            }