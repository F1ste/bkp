import axios from "axios";
import {notification} from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {

    const collectionStore = document.getElementById('collection-store')

    if(!collectionStore) return false

    /*const editor = new EditorJS({
      holder: 'editorjs'
    });*/

    var editorData = {};
    var textareas = document.querySelectorAll("textarea:not(#video)");
    textareas.forEach(function (textarea) {
      var editor = CKEDITOR.replace(textarea);
      CKFinder.setupCKEditor(editor);
      var excerptFieldName = textarea.id;
      (function (currentEditor, fieldName) {
        editorData[fieldName] = currentEditor.getData();
        currentEditor.on("change", function () {
          editorData[fieldName] = currentEditor.getData();
        });
      })(editor, excerptFieldName);
    });


    const findPartnerSect = document.querySelector('.create-project__find-partners');
    const addPartnerBtn = findPartnerSect.querySelector('.add-partner__input');
    let partnersEditors = document.querySelectorAll('.find-partners__partner-block');
    let editorsCount = partnersEditors.length;
    if (addPartnerBtn) {
        function initializeCKEditorForTextarea(textareaId) {
            var editor = CKEDITOR.replace(textareaId);
            CKFinder.setupCKEditor(editor);
            var excerptFieldName = textareaId;
            editorData[excerptFieldName] = editor.getData();
            editor.on("change", function () {
              editorData[excerptFieldName] = editor.getData();
            });
          }
          

            addPartnerBtn.addEventListener('click', () => {
              setTimeout(() => {
                var newTextareaId = 'FormProjectPartnerDescription' + editorsCount;
                initializeCKEditorForTextarea(newTextareaId)
                editorsCount++;
              }, 1);
            })
    }


  


    const storeRoute = collectionStore.dataset.store;

    var img1 = '',
    img2 = '',
    img3 = '',
    img4 = '',
    img5 = '',
    img6 = '';

    const select = {
        image: '.collection-item__upload',
        imageEl: '.collection-item',
        collectionGroup: '.collection-group',
        delete: '.collection-item__delete',
        name: 'name',
        excerpt: editorData.excerpt,
        date_service_from: 'date_service_from',
        date_service_to: 'date_service_to',
        price: 'price',
        region: 'region',
        tip: 'tip',
        teg: 'teg',
        tema: 'tema',
        tel: 'tel',
        email: 'email',
        name_proj: 'name_proj',
        video: 'video',
        storeButton: 'store-button',
        serch: 'find-partners__partner-block',
        img1: 'img1',
        img2: 'img2',
        img3: 'img3',
        img4: 'img4',
        img5: 'img5',
        img6: 'img6',
    }

   document.getElementById(select.img1).addEventListener('click', e => {
        const blox = document.getElementById('img1_box');
        const avatar = document.getElementById(select.img1).dataset.img;
        const input = document.getElementById('img1_input');
        const form = document.getElementById('form_img_1');
        const fin = document.getElementById('img1_fin');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img1 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })

      document.getElementById(select.img2).addEventListener('click', e => {
        const blox = document.getElementById('img2_box');
        const avatar = document.getElementById(select.img2).dataset.img;
        const input = document.getElementById('img2_input');
        const form = document.getElementById('form_img_2');
        const fin = document.getElementById('img2_fin');



         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img2 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })


         document.getElementById(select.img3).addEventListener('click', e => {
        const blox = document.getElementById('img3_box');
        const avatar = document.getElementById(select.img3).dataset.img;
        const input = document.getElementById('img3_input');
        const form = document.getElementById('form_img_3');
        const fin = document.getElementById('img3_fin');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img3 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })


       document.getElementById(select.img4).addEventListener('click', e => {
        const blox = document.getElementById('img4_box');
        const avatar = document.getElementById(select.img4).dataset.img;
        const input = document.getElementById('img4_input');
        const form = document.getElementById('form_img_4');
        const fin = document.getElementById('img4_fin');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img4 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })

          document.getElementById(select.img5).addEventListener('click', e => {
        const blox = document.getElementById('img5_box');
        const avatar = document.getElementById(select.img5).dataset.img;
        const input = document.getElementById('img5_input');
        const form = document.getElementById('form_img_5');
        const fin = document.getElementById('img5_fin');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img5 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })

            document.getElementById(select.img6).addEventListener('click', e => {
        const blox = document.getElementById('img6_box');
        const avatar = document.getElementById(select.img6).dataset.img;
        const input = document.getElementById('img6_input');
        const form = document.getElementById('form_img_6');
        const fin = document.getElementById('img6_fin');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img6 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })
    document.getElementById(select.storeButton).addEventListener('click', e => {
        let name = document.getElementById(select.name).value,
            excerpt = editorData.excerpt,
            date_service_from = document.getElementById(select.date_service_from).value,
            date_service_to = document.getElementById(select.date_service_to).value,
            price = 0,
            imagesEl = document.querySelectorAll(select.imageEl),
            images = {},
            image = [],
            region = document.getElementById(select.region).value,
            tip = document.getElementById(select.tip).value,
            teg_mas = document.getElementById(select.teg),
            tema = document.getElementById(select.tema).value,
            tel = document.getElementById(select.tel).value,
            email = document.getElementById(select.email).value,
            name_proj = document.getElementById(select.name_proj).value,
            video = document.getElementById(select.video).value,
            teg = [],
            serch_mas = document.getElementsByClassName(select.serch),
            serch = [];


            if(name_proj == ''){
                alert('Заполните название проекта');
                return false;
            } 

             if(name == ''){
                alert('Заполните Контактную информацию!');
                return false
            }

            if(excerpt == ''){
                alert('Все описание!');
                return false
            }

           //случай мульти-режима
            if (teg_mas.multiple) {
              //перебираем массив опций
              for (var i = 0; i < teg_mas.options.length; i ++) {
                //если опция выбрана - добавим её в массив
                if (teg_mas.options[i].selected)
                   teg.push(teg_mas.options[i].value);
              }
            //случай одиночного выбора в select
            } else
              teg.push(elm.value);

              teg.shift();


              for (var i = 0; i < serch_mas.length; i ++) {
                   serch[i] = {};
                   serch[i]['sel'] = serch_mas[i].getElementsByTagName("select")[0].value;
                   var textareaId = serch_mas[i].getElementsByTagName("textarea")[0].id;
                   serch[i]['tex'] = editorData[textareaId];
                   serch[i]['inp'] = serch_mas[i].getElementsByTagName("input")[0].value;
              }


        for(let i = 0; imagesEl.length > i; i++) {
            if(imagesEl[i].querySelectorAll('img').length !== 0) {
                image.push(imagesEl[i].querySelectorAll('img')[0].getAttribute('src'))
            }
        }
        images.images = image
        
        //if(name.length === 0 || excerpt.length === 0) return false

        document.getElementById(select.storeButton).innerHTML = `Подождите...`



        axios.post(storeRoute, {
            name: name,
            images: JSON.stringify(images),
            excerpt: excerpt,
            date_service_from: date_service_from,
            date_service_to: date_service_to,
            price: price,
            region: region,
            tip: tip,
            teg: JSON.stringify(teg),
            tema: tema,
            tel: tel,
            email: email,
            name_proj: name_proj,
            video: video,
            serch:  JSON.stringify(serch),
            img1: img1,
            img2: img2,
            img3: img3,
            img4: img4,
            img5: img5,
            img6: img6
        }).then(e => {
            window.location.href = e.data
        }).catch(error => {
            console.log(error)
            notification('Упс, что-то пошло не так', 'Не удалось создать услугу... Попробуйте позже')
        })
    })

    document.querySelectorAll(select.collectionGroup).forEach(el => el.addEventListener('click', e => {
        e.preventDefault()
        if(!e.target.closest('.collection-item__delete')) return false

        const template = `
            <a href="#" class="collection-item__upload">
                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5"></path>
                </svg>
            </a>
        `

        e.target.closest('.collection-item__new').innerHTML = template
    }))
})()
