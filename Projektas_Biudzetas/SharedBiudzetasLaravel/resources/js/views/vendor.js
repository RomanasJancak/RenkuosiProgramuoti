document.querySelectorAll('.Vendor_cancel').forEach(item => {
    item.addEventListener('click', event => {
        document.getElementById('Vendor_'+item.name+'_editButton').removeAttribute("hidden"); 
        document.getElementById('Vendor_'+item.name+'_confirm').setAttribute("hidden", "hidden");
        document.getElementById('Vendor_'+item.name+'_cancel').setAttribute("hidden", "hidden");
        {
            var a   =   document.getElementById('Vendor_'+item.name+'_nameTD');
                a.contentEditable = "false";
                a.addEventListener("input", function() {
                    // console.log(a.innerHTML);
                    document.getElementById('Vendor_'+item.name+'_nameInput').value = a.innerHTML;
                }, false);
            var b   =   document.getElementById('Vendor_'+item.name+'_ChainNameTD');
                b.contentEditable = "false";
                b.addEventListener("input", function() {
                    // console.log(b.innerHTML);
                    document.getElementById('Vendor_'+item.name+'_ChainNameInput').value = b.innerHTML;
                }, false);
            var c   =   document.getElementById('Vendor_'+item.name+'_adressTD');
                c.contentEditable = "false";
                c.addEventListener("input", function() {
                    // console.log(c.innerHTML);
                    document.getElementById('Vendor_'+item.name+'_adressInput').value = c.innerHTML;
                }, false);
            var d   =   document.getElementById('Vendor_'+item.name+'_codeTD');
                d.contentEditable = "false";
                d.addEventListener("input", function() {
                    // console.log(c.innerHTML);
                    document.getElementById('Vendor_'+item.name+'_codeInput').value = d.innerHTML;
                }, false);
            var e   =   document.getElementById('Vendor_'+item.name+'_vatcodeTD');
                e.contentEditable = "false";
                e.addEventListener("input", function() {
                    // console.log(c.innerHTML);
                    document.getElementById('Vendor_'+item.name+'_vatcodeInput').value = e.innerHTML;
                }, false);
            }

    });
});
document.querySelectorAll('.Vendor_editButton').forEach(item => {
    item.addEventListener('click', event => {
        {
        var a   =   document.getElementById('Vendor_'+item.name+'_nameTD');
            a.contentEditable = "true";
            a.style.backgroundColor = "red";
            a.addEventListener("input", function() {
                // console.log(a.innerHTML);
                document.getElementById('Vendor_'+item.name+'_nameInput').value = a.innerHTML;
            }, false);
        var b   =   document.getElementById('Vendor_'+item.name+'_ChainNameTD');
            b.contentEditable = "true";
            b.addEventListener("input", function() {
                // console.log(b.innerHTML);
                document.getElementById('Vendor_'+item.name+'_ChainNameInput').value = b.innerHTML;
            }, false);
        var c   =   document.getElementById('Vendor_'+item.name+'_adressTD');
            c.contentEditable = "true";
            c.addEventListener("input", function() {
                // console.log(c.innerHTML);
                document.getElementById('Vendor_'+item.name+'_adressInput').value = c.innerHTML;
            }, false);
        var d   =   document.getElementById('Vendor_'+item.name+'_codeTD');
            d.contentEditable = "true";
            d.addEventListener("input", function() {
                // console.log(c.innerHTML);
                document.getElementById('Vendor_'+item.name+'_codeInput').value = d.innerHTML;
            }, false);
        var e   =   document.getElementById('Vendor_'+item.name+'_vatcodeTD');
            e.contentEditable = "true";
            e.addEventListener("input", function() {
                // console.log(c.innerHTML);
                document.getElementById('Vendor_'+item.name+'_vatcodeInput').value = e.innerHTML;
            }, false);
        }
        document.getElementById('Vendor_'+item.name+'_editButton').setAttribute("hidden", "hidden");
        document.getElementById('Vendor_'+item.name+'_confirm').removeAttribute("hidden");
        document.getElementById('Vendor_'+item.name+'_cancel').removeAttribute("hidden");
    })
  });
