import axios from "axios";
import {notification} from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";
(() => {

    const collectionStore = document.getElementById('news-store')

    if(!collectionStore) return false

    const storeRoute = collectionStore.dataset.store;

    var img1 = '',
     img2 = '',
    img3 = '',
    img4 = '',
    img5 = '',
    img6 = '',
    img7 = '';

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

    const select = {
        img1: 'img1',
        name: 'name',
        pod_text: editorData.pod_text,
        text: editorData.text,
        storeButton: 'store-button',
        project: 'project',
        rubrica: 'rubrica',
        banner: 'banner',
        date: 'date',
        glav: 'glav',
        pozits: 'pozits',
        img2: 'img2',
        img3: 'img3',
        img4: 'img4',
        img5: 'img5',
        video: 'video',
        img6: 'img6',
        img7: 'img7',
    }

    document.getElementById(select.img1).addEventListener('click', e => {
        const blox = document.getElementById('img1_box');
        const avatar = document.getElementById(select.img1).dataset.img;
        const input = document.getElementById('img1_input');
        const form = document.getElementById('form_img_1');
        const fin = document.getElementById('img1_fin');
        const deleteButton = document.getElementById('img1_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img1 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         
         deleteButton.addEventListener('click', (e) => {
            img1 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = '';
        });
    })

      document.getElementById(select.img2).addEventListener('click', e => {
        const blox = document.getElementById('img2_box');
        const avatar = document.getElementById(select.img2).dataset.img;
        const input = document.getElementById('img2_input');
        const form = document.getElementById('form_img_2');
        const fin = document.getElementById('img2_fin');
        const deleteButton = document.getElementById('img2_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img2 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         deleteButton.addEventListener('click', () => {
            img2 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = ''; 
        });
    })


         document.getElementById(select.img3).addEventListener('click', e => {
        const blox = document.getElementById('img3_box');
        const avatar = document.getElementById(select.img3).dataset.img;
        const input = document.getElementById('img3_input');
        const form = document.getElementById('form_img_3');
        const fin = document.getElementById('img3_fin');
        const deleteButton = document.getElementById('img3_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img3 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         deleteButton.addEventListener('click', () => {
            img3 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = ''; 
        });
    })


       document.getElementById(select.img4).addEventListener('click', e => {
        const blox = document.getElementById('img4_box');
        const avatar = document.getElementById(select.img4).dataset.img;
        const input = document.getElementById('img4_input');
        const form = document.getElementById('form_img_4');
        const fin = document.getElementById('img4_fin');
        const deleteButton = document.getElementById('img4_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img4 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         deleteButton.addEventListener('click', () => {
            img4 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = ''; 
        });

    })

          document.getElementById(select.img5).addEventListener('click', e => {
        const blox = document.getElementById('img5_box');
        const avatar = document.getElementById(select.img5).dataset.img;
        const input = document.getElementById('img5_input');
        const form = document.getElementById('form_img_5');
        const fin = document.getElementById('img5_fin');
        const deleteButton = document.getElementById('img5_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img5 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         deleteButton.addEventListener('click', () => {
            img5 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = ''; 
        });
    })

            document.getElementById(select.img6).addEventListener('click', e => {
        const blox = document.getElementById('img6_box');
        const avatar = document.getElementById(select.img6).dataset.img;
        const input = document.getElementById('img6_input');
        const form = document.getElementById('form_img_6');
        const fin = document.getElementById('img6_fin');
        const deleteButton = document.getElementById('img6_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img6 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         deleteButton.addEventListener('click', () => {
            img6 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = ''; 
        });
    })

        document.getElementById(select.img7).addEventListener('click', e => {
        const blox = document.getElementById('img7_box');
        const avatar = document.getElementById(select.img7).dataset.img;
        const input = document.getElementById('img7_input');
        const form = document.getElementById('form_img_7');
        const fin = document.getElementById('img7_fin');
        const deleteButton = document.getElementById('img7_delete');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img7 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                    deleteButton.style.display = "block";
                })

         })
         deleteButton.addEventListener('click', () => {
            img7 = '';
            fin.removeAttribute('src');
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = ''; 
        });

    })




    document.getElementById(select.storeButton).addEventListener('click', e => {
        let name = document.getElementById(select.name).value,
            pod_text = editorData.pod_text,
            text = editorData.text,
            project = document.getElementById(select.project).value,
            rubrica = document.getElementById(select.rubrica).value,
            banner = document.getElementById(select.banner).value,
            date = document.getElementById(select.date).value,
            glav = document.getElementById(select.glav).value,
            pozits = document.getElementById(select.pozits).value,
            video = document.getElementById(select.video).value;


        if(name == ''){
            alert('Заполните Название новости!');
            return false
        }


        document.getElementById(select.storeButton).innerHTML = `Подождите...`



        axios.post(storeRoute, {
            name: name,
            pod_text: pod_text,
            text: text,
            img1: img1,
            img2: img2,
            img3: img3,
            img4: img4,
            img5: img5,
            img6: img6,
            img7: img7,
            project:  project,
            rubrica:  rubrica,
            banner:  banner,
            date:  date,
            glav:  glav,
            pozits:  pozits,
            video: video
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























