
                            <table id="gest_admin" class="bordered highlight centered responsive-table " cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Ad</th>
                                    <th>Url</th>
                                    <th>Impressions</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($publisher as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->id_ad }}</td>
                                    <td>{{ substr($p->url,0,20) }}</td>
                                    <td>{{ $p->impressions }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
