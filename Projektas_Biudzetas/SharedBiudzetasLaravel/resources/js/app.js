/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
//import * as tempjs from 'tempscripts.js';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');


//
//
/////////////////////////////////////////////////
//
//
// console.log(window.location.pathname);
// console.log(window.location.search);
// console.log(new URL(window.location.href).pathname);
// if(window.location.pathname.includes('/apsipirkimai/show/')){
//     console.log('contains');
// };

// document.getElementById("Vendor_editButton").addEventListener("click",function(){
//     let btn = document.getElementById("Vendor_editButton");
//     console.log(btn.id);
// });
document.querySelectorAll('.Vendor_cancel').forEach(item => {
    item.addEventListener('click', event => {
        document.getElementById('Vendor_'+item.name+'_editButton').removeAttribute("hidden"); 
        document.getElementById('Vendor_'+item.name+'_confirm').setAttribute("hidden", "hidden");
        document.getElementById('Vendor_'+item.name+'_cancel').setAttribute("hidden", "hidden");        
    });
});
document.querySelectorAll('.Vendor_editButton').forEach(item => {
    item.addEventListener('click', event => {
        var a   =   document.getElementById('Vendor_'+item.name+'_nameTD');
            a.contentEditable = "true";
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
        document.getElementById('Vendor_'+item.name+'_editButton').setAttribute("hidden", "hidden");
        document.getElementById('Vendor_'+item.name+'_confirm').removeAttribute("hidden");
        document.getElementById('Vendor_'+item.name+'_cancel').removeAttribute("hidden");
    })
  });
//   document.getElementById("editor").addEventListener("input", function() {
//     console.log("input event fired");
// }, false);
function changeColor(newColor) {
    const elem = document.getElementById('pirkiniu_sarasas');
    elem.style.color = newColor;
};


document.getElementById ("redbutton").addEventListener ("click", function(){
    var doc =   document.getElementById ("pirkiniu_sarasas")
    var tag_tr  =   document.createElement("tr");

        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
            tag_td.appendChild(text);
            tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
            tag_td.appendChild(text);
            tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
        tag_td.appendChild(text);
        tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
            tag_td.appendChild(text);
            tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
            tag_td.appendChild(text);
            tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
        tag_td.appendChild(text);
        tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
            tag_td.appendChild(text);
            tag_tr.appendChild(tag_td);
        var tag_td  =   document.createElement("td");
        var text    =   document.createTextNode("vardas");
        tag_td.appendChild(text);
        tag_tr.appendChild(tag_td);

    doc.appendChild(tag_tr);    

});
document.getElementById ("bluebutton").addEventListener ("click", function(){
changeColor('blue')
});
$(document).ready(function(){
    //------
    //var form = '#add-user-form';
    var form = '#naujas_pirkinys';
    //------
    
    $(form).on('submit', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                $(form).trigger("reset");
                alert(response.success)
            },
            error: function(response) {
            }
        });
    });

});