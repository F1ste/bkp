
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";
import datepicker from 'js-datepicker';


(() => {
    const sidebar = document.querySelector('.sidebar');
    
    if (!sidebar) {
        return false;
    }

    const header = document.querySelector('.header');
    const sidebarExpand = sidebar.querySelector('.sidebar__expand .sidebar__item');
    const sidebarItems = sidebar.querySelectorAll('.sidebar__item');
    const sidebarInfo = sidebar.querySelector('.sidebar__info')
    
    sidebarExpand.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar__expanded');
        const expandedEl = document.querySelector('.sidebar__expanded');
        
        sidebarInfo.style.display = "block";
            
        sidebarItems.forEach(item => {
            let textAtr = item.getAttribute('dataText');
            item.innerHTML = textAtr;
        });

        if (!expandedEl) {
            sidebarItems.forEach(item => {
                item.innerHTML = '';
            });
            sidebarInfo.style.display = "none";
        }
       
    })

    let headerHeight = header.getBoundingClientRect().height;

    const stickyNav = function (entries) {
        const [entry] = entries;
        //console.log(entry);
      
        if (!entry.isIntersecting) {
            sidebar.classList.add('fixed');
        }
        else {
            sidebar.classList.remove('fixed');
        };
      };
      
    const headerObserver = new IntersectionObserver(stickyNav, {
        root: null,
        threshold: 1.0,
        rootMargin: `${headerHeight}px`,
    });
      
    headerObserver.observe(header);

    

})();


const dropArea = document.querySelectorAll('.drag-and-drop');
if (dropArea.length != 0 ) {
    const validFileExtensions = /(?<=\.|^)[^.]+(\.jpg|\.jpeg|\.png)$/i;
    let filesToUpload = [];
    const dragWrapper = document.querySelector(".drag-wrapper");
    const fileInput = document.querySelector(".file__input");

    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.forEach(element => {
            element.addEventListener(eventName, preventDefaults, false);
        });
    })
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    dropArea.forEach(element => {
        element.addEventListener('click', handleClick, false);
    });
 

    function handleClick(e) {
        fileInput.click();
    }
    fileInput.onchange = () => {
        const files = fileInput.files;
        handleFiles(files);

    }
    function handleDrop(e) {
        let dt = e.dataTransfer;
        let files = dt.files;
        handleFiles(files);
    }
    function handleFiles(files) {
        files = [...files];
        files.forEach(file => {
            console.log(file);
        });
    }

}

const projectDescriptionBtn = document.querySelector('.project-main__btn-description');

if (projectDescriptionBtn) {
    projectDescriptionBtn.addEventListener('click', () => {
        const item = document.querySelector('.project-details');
        let topPos = item.offsetTop;
        window.scroll({top: topPos, left: 0, behavior: 'smooth'});
    })
}


(() => {
    
    const findPartnerSect = document.querySelector('.create-project__find-partners');
    
    if (!findPartnerSect) {
        return false;
    }
    
    const addPartnerBtn = findPartnerSect.querySelector('.add-partner__input');
    
    const findPartnerContent = findPartnerSect.querySelector('.find-partners__content');
    
    function addPartner(e) {
        const clickedEl = e.target
        const findPartnerBlock = findPartnerSect.querySelectorAll('.find-partners__partner-block');

        let partnerCount = findPartnerBlock.length;
        let partnerBlockTempl = 
        `
        <div class="find-partners__partner-block">
            <div class="create-project__form-select">
                <label class="create-project__form-label form__label">Кого ищем</label>
                <select data-scroll name="form[]" class="form__select">
                    <option value="" selected>Выбрать</option>
                    <option value="2">Пункт 1</option>
                    <option value="3">Пункт 2</option>
                </select>
            </div>
                <div class="create-project__role-description form__item">
                    <label for="FormProjectPartnerDescription" class="create-project__form-label form__label">Описание</label>
                    <textarea id="FormProjectPartnerDescription" type="text" name="roleDescription"
                    class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов"></textarea>
                </div>
            <div class="create-project__form-item form__item">
                <label for="FormProjectRoleUntil" class="create-project__form-label form__label">До какого числа принимаются заявки</label>
                <input id="FormProjectRoleUntil" autocomplete="off" data-datepicker data-datepicker_partner_${partnerCount + + 1} type="text" name="projectName" class="create-project__form-input form__input" placeholder="До 10.09.2023" data-placeholder="До 10.09.2023">
            </div>
        </div>
        `
        findPartnerContent.insertAdjacentHTML('beforeend', partnerBlockTempl)


        // Инициализация нового select
        const selectInstance = flsModules.select;
        const newPartnerBlock = findPartnerContent.lastElementChild;
        const newSelect = newPartnerBlock.querySelector('select');
        selectInstance.selectInit(newSelect);

        // Создание календаря для нового партнера
        const newDatePickerInput = newPartnerBlock.querySelector(`[data-datepicker_partner_${partnerCount + + 1}]`);
        const pickerPartner = datepicker(newDatePickerInput, {
            customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
            customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
            overlayButton: 'Применить',
            overlayPlaceholder: 'Год (4 цифры)',
            startDay: 1,
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString();
                input.value = value;
            },
            onSelect: function (input, instance, date) {
                // Your onSelect logic here
            }
        });
    }

    addPartnerBtn.addEventListener('click', addPartner);
})();

