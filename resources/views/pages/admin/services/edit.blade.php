@extends('layouts.admin')

@section('title', 'Редактировать проект')

@section('content')



            <div  class="page__container" >

                <section class="create-project personal-account" id="admin-collection-edit" data-iduzer="{{ $id_uzer }}" data-id="{{ $id }}" data-image="{{ route('profile.services.upload') }}" data-update="{{ route('admin.services.edit') }}">

                     <div class="create-project__container">
                        <div class="create-project__content">
                            <div class="create-project__title personal__title">Редактирование проекта</div>

                                <div class="create-project__general-info">
                                    <div class="create-project__form-img">
                                        <label class="create-project__form-label form__label">Основное фото проекта</label>
                                        <div class="create-project__main-photo form__input add-photo">
                                            <div data-img="{{ route('profile.services.img1') }}" class="create-project__drag-and-drop drag-and-drop" id='img1'>
                                                @if($collection->img1 == '')
                                                <div class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                                    <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                    <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                                    <div class="create-project__upload-info">Загрузите основное фото проекта</div>
                                                </div>

                                                <img id="img1_fin" class='form_img_cul' style='width: 100%;' src="">
                                                @else

                                                 <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img1_box'>
                                                    <form id='form_img_1'><input id='img1_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                    <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img.svg" alt="Загрузите основное фото проекта"></div>
                                                    <div class="create-project__upload-info">Загрузите основное фото проекта</div>
                                                </div>

                                                <img id="img1_fin" class='form_img_cul' style="width: 100%;display: block;" src="{{ $collection->img1 }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="create-project__photo-propetries">950x310 px, до 1 Мб</div>
                                    </div>
                                    <div class="create-project__main-info">
                                        <div class="create-project__main-col">
                                            <div class="create-project__form-item form__item">
                                                <label for="name_proj" class="create-project__form-label form__label">Название проекта</label>
                                                <input value="{{ $collection->name_proj }}" id="name_proj" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Название проекта" data-placeholder="Название проекта">
                                            </div>
                                            <div class="create-project__form-item form__item">
                                                <label for="date_service_from" class="create-project__form-label form__label">Сроки начала проекта</label>
                                                <input data-datepicker data-datepicker_1 id="date_service_from" type="text"
                                                readonly autocomplete="off" name="projectName"
                                                value="{{ Carbon\Carbon::parse($collection->date_service_from)->format('d.m.Y') }}"
                                                class="create-project__form-input form__input"
                                                placeholder="C" data-placeholder="C">
                                            </div>
                                            <div class="create-project__form-item form__item">
                                                <label for="date_service_to" class="create-project__form-label form__label">Сроки окончания проекта</label>
                                                <input
                                                data-datepicker data-datepicker_2 id="date_service_to"
                                                type="text" readonly autocomplete="off"
                                                name="projectName" value="{{ Carbon\Carbon::parse($collection->date_service_to)->format('d.m.Y') }}"
                                                class="create-project__form-input form__input" placeholder="До" data-placeholder="До"
                                                >
                                            </div>
                                        </div>
                                        <div class="create-project__main-col">
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Регион</label>
                                                <select id="region" data-scroll name="form[]" class="form__select">
                                                    <option value=""  @if($collection->region == '') selected @endif>Выбрать</option>
                                                   @foreach($region as $el)
                                                         <option value="{{$el -> name}}" @if($collection->region == $el -> name) selected @endif>{{$el -> name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Тип события</label>
                                                <select id="tip" data-scroll name="form[]" class="form__select">
                                                    <option value="" @if($collection->tip == '') selected @endif>Выбрать</option>
                                                      @foreach($subject as $el)
                                                         <option value="{{$el -> name}}"  @if($collection->tip == $el -> name) selected @endif>{{$el -> name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Тематика проекта</label>
                                                <select id="tema" data-scroll name="form[]" class="form__select">
                                                    <option value="" @if($collection->tema == '') selected @endif>Выбрать</option>
                                                     @foreach($event as $el)
                                                         <option value="{{$el -> name}}" @if($collection->tema == $el -> name) selected @endif>{{$el -> name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Теги проекта</label>
                                                <select id="teg" data-scroll multiple name="form[]" class="form__select">
                                                    <option value="" selected>Выбрать</option>
                                                     @foreach($tegs as $el)
                                                         <option value="{{$el -> name}}"  @if(in_array($el -> name ,$teg)) selected @endif>{{$el -> name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="create-project__description">
                                    <div class="create-project__project-description">
                                        <div class="create-project__form-item form__item">
                                            <label for="excerpt" class="create-project__form-label form__label">Описание проекта</label>
                                            <textarea id="excerpt" type="text" name="projectDescription" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов">{{ $collection->excerpt }}</textarea>
                                        </div>
                                    </div>
                                    <div class="create-project__project-gallery">
                                        <div class="create-project__form-img">
                                            <label class="create-project__form-label form__label">Галерея проекта</label>
                                            <div class="create-project__gallery-big form__input add-photo">

                                                 @if($collection->img2 == '')
                                                <div data-img="{{ route('profile.services.img2') }}" class="create-project__drag-and-drop drag-and-drop" id='img2'>
                                                    <div class="create-project__drag-wrapper drag-wrapper" id='img2_box'>
                                                        <form id='form_img_2'><input id='img2_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                        <div class="create-project__upload-info">Загрузите фото </div>
                                                    </div>
                                                    <img id="img2_fin" class='form_img_cul' style='width: 100%;' src="">
                                                </div>
                                                @else

                                                 <div   data-img="{{ route('profile.services.img2') }}" class="create-project__drag-and-drop drag-and-drop" id='img2'>
                                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img2_box'>
                                                        <form id='form_img_2'><input id='img2_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                        <div class="create-project__upload-info">Загрузите фото </div>
                                                    </div>
                                                    <img id="img2_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img2 }}">
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                @if($collection->img3 == '')
                                               <div data-img="{{ route('profile.services.img3') }}" class="create-project__drag-and-drop drag-and-drop" id='img3'>
                                                    <div class="create-project__drag-wrapper drag-wrapper" id='img3_box'>
                                                        <form id='form_img_3'><input id='img3_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img3_fin" class='form_img_cul' style='width: 100%;' src="">
                                                </div>
                                                @else


                                                <div  data-img="{{ route('profile.services.img3') }}" class="create-project__drag-and-drop drag-and-drop" id='img3'>
                                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img3_box'>
                                                        <form id='form_img_3'><input id='img3_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img3_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img3 }}">
                                                </div>


                                                @endif
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                 @if($collection->img4 == '')
                                                <div data-img="{{ route('profile.services.img4') }}" class="create-project__drag-and-drop drag-and-drop" id='img4'>
                                                    <div class="create-project__drag-wrapper drag-wrapper" id='img4_box'>
                                                        <form id='form_img_4'><input id='img4_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img4_fin" class='form_img_cul' style='width: 100%;' src="">
                                                </div>
                                                @else

                                                 <div data-img="{{ route('profile.services.img4') }}" class="create-project__drag-and-drop drag-and-drop" id='img4'>
                                                    <div style="display: none;"  class="create-project__drag-wrapper drag-wrapper" id='img4_box'>
                                                        <form id='form_img_4'><input id='img4_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img4_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img4 }}">
                                                </div>



                                                @endif
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">

                                                @if($collection->img5 == '')
                                                 <div data-img="{{ route('profile.services.img5') }}" class="create-project__drag-and-drop drag-and-drop" id='img5'>
                                                    <div class="create-project__drag-wrapper drag-wrapper" id='img5_box'>
                                                        <form id='form_img_5'><input id='img5_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img5_fin" class='form_img_cul' style='width: 100%;' src="">
                                                </div>
                                                @else

                                                 <div  data-img="{{ route('profile.services.img5') }}" class="create-project__drag-and-drop drag-and-drop" id='img5'>
                                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img5_box'>
                                                        <form id='form_img_5'><input id='img5_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img5_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img5 }}">
                                                </div>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="create-project__form-img">
                                            <div class="create-project__gallery form__input add-photo">
                                            @if($collection->img5 == '')
                                                 <div data-img="{{ route('profile.services.img6') }}" class="create-project__drag-and-drop drag-and-drop" id='img6'>
                                                    <div class="create-project__drag-wrapper drag-wrapper" id='img6_box'>
                                                        <form id='form_img_6'><input id='img6_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img6_fin" class='form_img_cul' style='width: 100%;' src="">
                                                </div>
                                                @else

                                                <div  data-img="{{ route('profile.services.img6') }}" class="create-project__drag-and-drop drag-and-drop" id='img6'>
                                                    <div style="display: none;" class="create-project__drag-wrapper drag-wrapper" id='img6_box'>
                                                        <form id='form_img_6'><input id='img6_input' type="file" name="file" class="file__input" accept=".jpeg, .jpg, .png" hidden></form>
                                                        <div class="create-project__upload-logo"><img src="/image/iconsFont/add-img_thin.svg" alt="Загрузите фото "></div>
                                                    </div>
                                                    <img id="img6_fin" class='form_img_cul' style="width: 100%; display: block;" src="{{ $collection->img6 }}">
                                                </div>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="create-project__add-code">
                                            <div class="create-project__form-item form__item">
                                                <label for="video" class="create-project__form-label form__label">Код видео
                                                    <button type="button" data-tippy-content="Вставьте код (frame) видео. Плееры, которые поддерживает платформа:
                                                        YouTube, RuTube, «ВКонтакте» или «Одноклассники»" class="_icon-info"></button>
                                                </label>
                                                <textarea id="video" type="text" name="addCode" class="create-project__form-input form__input add-code" placeholder="Добавьте код встраивания плеера трансляции" data-placeholder="Не более 10000 символов">{{ $collection->video }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="create-project__find-partners">
                                    <div class="create-project__title personal__title">Кого ищем</div>
                                    <div class="find-partners__content">

                                        @foreach($serch as $key => $serchs)
                                        <div class="find-partners__partner-block">
                                            <div class="create-project__form-select">
                                                <label class="create-project__form-label form__label">Кого ищем</label>
                                                <select data-scroll name="form[]" class="form__select">
                                                    <option value="" @if($serchs->sel == '') selected @endif>Выбрать</option>

                                                    @foreach($roles as $el)
                                                         <option value="{{$el -> name}}" @if($serchs->sel == $el -> name) selected @endif>{{$el -> name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="create-project__form-item form__item">
                                                <label for="FormProjectRoleUntil" class="create-project__form-label form__label">До какого числа принимаются заявки</label>
                                                <input id="FormProjectRoleUntil" autocomplete="off"
                                                data-datepicker data-datepicker_{{ $key + 3 }} type="text"
                                                name="projectName" class="create-project__form-input form__input"
                                                value='{{ $serchs->inp }}' placeholder="До 10.09.2023" data-placeholder="До 10.09.2023">
                                            </div>
                                            <div class="create-project__role-description form__item">
                                                <label for="FormProjectPartnerDescription" class="create-project__form-label form__label">Описание</label>
                                                <textarea id="FormProjectPartnerDescription" type="text" name="roleDescription" class="create-project__form-input form__input project-description" placeholder="Не более 10000 символов" data-placeholder="Не более 10000 символов">{{ $serchs->tex }}</textarea>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>
                                <div class="create-project__footer">
                                    <div class="create-project__title personal__title">Контакты для связи:</div>
                                    <div class="create-project__footer-content">
                                        <div class="create-project__form-item form__item">
                                            <label for="name" class="create-project__form-label form__label">
                                                Имя Фамилия*
                                            </label>
                                            <input id="name" type="text" name="projectName" class="create-project__form-input form__input" value="{{ $collection->name }}" placeholder="Контакт" data-placeholder="Контакт">
                                        </div>
                                        <div class="create-project__form-item form__item">
                                            <label for="tel" class="create-project__form-label form__label">
                                                Телефон*
                                                <button type="button" data-tippy-content="Укажите телефон контактного лица, которому можно позвонить,
                                                    если возникнут технические вопросы." class="_icon-info"></button>
                                            </label>
                                            <input id="tel" type="text" name="projectName" class="create-project__form-input form__input" placeholder="8 000 000 00 00" data-placeholder="8 000 000 00 00" value="{{ $collection->tel }}" data-inputmask="'mask': '8 999 999 99 99'">
                                        </div>
                                        <div class="create-project__form-item form__item">
                                            <label for="Femail" class="create-project__form-label form__label">
                                                Почта*
                                            </label>
                                            <input id="email" type="text" name="projectName" class="create-project__form-input form__input" placeholder="Email" data-placeholder="Email" value="{{ $collection->email }}">
                                        </div>
                                    </div>




                                <div class="profile__form-block">
                                    <div class="profile__title personal__title">Организация</div>
                                    <div class="profile__main-info">
                                        <div class="profile__form-item form__item">
                                            <label for="org" class="profile__form-label form__label">Название организации</label>
                                            <input id="org" type="text" class="profile__form-input form__input" placeholder="Название организации" data-placeholder="Название организации"
                                            value='{{ $user->org }}'>
                                        </div>
                                        <div class="profile__form-select">
                                            <label class="profile__form-label form__label">Город</label>
                                            <select id="city" data-scroll name="form[]" class="form__select">
                                                <option value="" @if($user->city == '') selected @endif>Город</option>
                                                <option value="2" @if( $user->city == '2') selected @endif>Москва</option>
                                                <option value="3"@if( $user->city == '3') selected @endif>Санкт-Петербург</option>
                                                <option value="4"@if( $user->city == '4') selected @endif>Воронеж</option>
                                            </select>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="ruk" class="profile__form-label form__label">Руководитель организации</label>
                                            <input id="ruk" type="text" class="profile__form-input form__input" placeholder="Руководитель организации" data-placeholder="Руководитель организации"
                                            value='{{ $user->ruk }}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="inn" class="profile__form-label form__label">ИНН организации</label>
                                            <input id="inn" type="text" class="profile__form-input form__input" placeholder="ИНН организации" data-placeholder="ИНН организации"
                                            value='{{ $user->inn }}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="napr" class="profile__form-label form__label">Направление деятельности</label>
                                            <input id="napr" type="text" class="profile__form-input form__input" placeholder="Направление деятельности" data-placeholder="Направление деятельности"
                                            value='{{ $user->napr }}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="tel_org" class="profile__form-label form__label">
                                                Телефон организации
                                            </label>
                                            <input id="tel_org" type="text" class="profile__form-input form__input" placeholder="Телефон организации" data-placeholder="Телефон организации" data-inputmask="'mask': '8 999 999 99 99'"
                                            value='{{ $user->tel_org }}'>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__form-block">
                                    <div class="profile__title personal__title">Социальные сети организации</div>
                                    <div class="profile__socials">
                                        <div class="profile__form-item form__item">
                                            <label for="sait" class="profile__form-label form__label">Сайт организации</label>
                                            <input id="sait" type="text" class="profile__form-input form__input" placeholder="Сайт" data-placeholder="Сайт" value='{{ $user->sait }}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="vk" class="profile__form-label form__label">Вконтакте</label>
                                            <input id="vk" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ $user->vk }}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="telegram" class="profile__form-label form__label">Телеграм</label>
                                            <input id="telegram" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ $user->telegram}}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="youtube" class="profile__form-label form__label">Ютуб</label>
                                            <input id="youtube" type="text" class="profile__form-input form__input" placeholder="Ссылка" data-placeholder="Ссылка" value='{{ $user->youtube}}'>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__form-block">
                                    <div class="profile__title personal__title">Пользователь</div>
                                    <div class="profile__user">
                                        <div class="profile__form-item form__item">
                                            <label for="surname" class="profile__form-label form__label">Фамилия</label>
                                            <input id="surname" type="text" class="profile__form-input form__input" placeholder="Фамилия" data-placeholder="Фамилия" value='{{ $user->surname}}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="first-name" class="profile__form-label form__label">Отчество</label>
                                            <input id="first-name" type="text" class="profile__form-input form__input" placeholder="Отчество" data-placeholder="Отчество" value='{{ $user->first_name}}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="phone" class="profile__form-label form__label">
                                                Телефон
                                            </label>
                                            <input id="phone" type="text" class="profile__form-input form__input" placeholder="Телефон" data-placeholder="Телефон" data-inputmask="'mask': '8 999 999 99 99'" value='{{ $user->phone}}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="dpl" class="profile__form-label form__label">Должность</label>
                                            <input id="dpl" type="text" class="profile__form-input form__input" placeholder="Должность" data-placeholder="Должность" value='{{ $user->dpl}}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="name" class="profile__form-label form__label">Имя</label>
                                            <input id="name" type="text" class="profile__form-input form__input" placeholder="Имя" data-placeholder="Имя" value='{{ $user->name}}'>
                                        </div>
                                        <div class="profile__cover-letter">
                                            <div class="profile__form-item" style="
    width: 100%;
    height: 100%;
">
                                                <label for="about" class="profile__form-label form__label">Краткое сопроводительное письмо</label>
                                                <textarea id="video" type="text" class="profile__form-input form__input project-description" placeholder="Краткое сопроводительное письмо" data-placeholder="Краткое сопроводительное письмо">{{ $user->about}}</textarea>
                                            </div>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="email" class="profile__form-label form__label">Электронная почта</label>
                                            <input id="email" type="text" class="profile__form-input form__input" placeholder="Электронная почта" data-placeholder="Электронная почта" value='{{ $user->email}}'>
                                        </div>
                                        <div class="profile__form-item form__item">
                                            <label for="portfol" class="profile__form-label form__label">Ссылка на соц. сети или портфолио</label>
                                            <input id="portfol" type="text" class="profile__form-input form__input" placeholder="Ссылка на соц. сети или портфолио" data-placeholder="Ссылка на соц. сети или портфолио" value='{{ $user->portfol}}'>
                                        </div>
                                        <div class="profile__checkbox-wrapper">


                                        </div>
                                    </div>
                                </div>






                                    <div class="create-project__buttons_admin">
                                        <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Удалить</a>-->
                                        <!--<a href="#" class="create-project__btn btn btn-white btn-border_black">Сохранить черновик</a>-->
                                        <button  style="
    margin-top: 20px;
" id='store-button' class="create-project__btn btn btn-filled">Cохранить изменения</button>
                                        <button id='store-button2' class="create-project__btn btn btn-filled">Перенести в архив</button>
                                        <button id='store-button3' class="create-project__btn btn btn-filled">Отклонить</button>
                                        <button id='store-button4' class="create-project__btn btn btn-filled">Продлить проект</button>
                                    </div>
                                </div>


                        </div>
                    </div>
                </section>

@endsection















