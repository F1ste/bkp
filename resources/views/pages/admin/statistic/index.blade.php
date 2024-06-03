@extends('layouts.admin')

@section('title', 'Статистика')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<style>
th { text-align: left }
td, th { padding: 3px 7px }
</style>
<div class="page__container" style="padding:30px 0">
    <section class="my-projects personal-account pl-5">
        <div class="flex items-start flex-wrap gap-7">
            <div style="border-radius: 6px; padding: 15px; box-shadow: 0 2px 2px 0 rgba(0,0,0,.14)">
                <h1 class="personal__title mb-4">Статистика</h1>
                <table>
                    <tbody>
                        <tr>
                            <th>Зарегистрировано пользователей</th>
                            <td class="text-right">{{ $users_registred }}</td>
                        </tr>
                        <tr>
                            <td>- сегодня</td>
                            <td class="text-right">{{ $users_registred_today }}</td>
                        </tr>
                        <tr>
                            <td>- за неделю</td>
                            <td class="text-right">{{ $users_registred_week }}</td>
                        </tr>
                        <tr>
                            <td>- за 30 дней</td>
                            <td class="text-right">{{ $users_registred_month }}</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Количество проектов</th>
                            <td class="text-right">{{ $projects }}</td>
                        </tr>
                        <tr>
                            <td>- создано сегодня</td>
                            <td class="text-right">{{ $projects_today }}</td>
                        </tr>
                        <tr>
                            <td>- создано за неделю</td>
                            <td class="text-right">{{ $projects_week }}</td>
                        </tr>
                        <tr>
                            <td>- создано за 30 дней</td>
                            <td class="text-right">{{ $projects_month }}</td>
                        </tr>
                        <tr>
                            <td>- в черновиках</td>
                            <td class="text-right">{{ $projects_drafts }}</td>
                        </tr>
                        <tr>
                            <td>- на модерации</td>
                            <td class="text-right">{{ $projects_on_moderation }}</td>
                        </tr>
                        <tr>
                            <td>- опубликовано</td>
                            <td class="text-right">{{ $projects_published }}</td>
                        </tr>
                        <tr>
                            <td>- в архиве</td>
                            <td class="text-right">{{ $projects_archived }}</td>
                        </tr>
                        <tr>
                            <td>- отклоненных</td>
                            <td class="text-right">{{ $projects_declined }}</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Количество откликов</th>
                            <td class="text-right">{{ $feedbacks }}</td>
                        </tr>
                        <tr>
                            <td>- принято/отклонено/ожидают</td>
                            <td class="text-right">
                                <span style="color:green">{{ $feedbacks_accepted }}</span>
                                /
                                <span style="color:red">{{ $feedbacks_declined }}</span>
                                /
                                <span style="color:gray">{{ $feedbacks_not_answered }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>- сегодня</td>
                            <td class="text-right">{{ $feedbacks_today }}</td>
                        </tr>
                        <tr>
                            <td>- за неделю</td>
                            <td class="text-right">{{ $feedbacks_week }}</td>
                        </tr>
                        <tr>
                            <td>- за 30 дней</td>
                            <td class="text-right">{{ $feedbacks_month }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="border-radius: 6px; padding: 15px; box-shadow: 0 2px 2px 0 rgba(0,0,0,.14)">
                <h1 class="personal__title mb-4">Пользователи без проектов</h1>
                <table class="min-w-full text-left text-sm font-light text-surface mb-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>E-mail</th>
                            <th>Зарегистрирован</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users_without_projects as $user)
                        <tr>
                            <td><a href="{{ route('admin.user.edit', $user) }}" style="color:#0000ee" target="_blank">{{ $user->id }}</a></td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-right">{{ $user->created_at->format('d.m.Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $users_without_projects->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
