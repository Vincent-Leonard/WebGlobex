@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List Data</h1>
            </div>
            <div class="row">
                @auth
                <div class="col-md-2 offset-md-10">
                    <a href="{{route('event.create')}}" class="btn btn-danger btn-block" role="button" aria-pressed="true">Tambah</a>
                </div>
                @endauth
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td><a href="@auth{{route('event.edit', $event)}}@endauth">{{$event->event}}</td>
                                <td>{{$event->type}}</td>
                                <td>{{$event->date}}</td>
                                <td>{{$event->status}}</td>
                                @auth
                                <td>
                                    <form action="{{ route('creator.event.show', $event) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Detail</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('event.destroy', $event)}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                @endauth
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
@endsection