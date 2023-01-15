 <!--  Single Attachment Start -->
 <div class="row">
     <div class="col-md-12">
         <div class="input-group attachments col-md-12 mb-4">
             <div class="input-group-prepend">
                  @if (isset($title))
                    <h5 class="input-group-text"> {{ $title }}</h5>
                 @endif
                 
                 @if (isset($subtitle))
                     <span>{{ $subtitle }}</span>
                 @endif
             </div>
             <div class="mt-10">
                 <table class="table table-borderless">
                     <tbody>
                         @if (isset($single_attachment))

                             @forelse ($single_attachment as $attachment)
                                 <tr class="control-group">
                                     <td>
                                         <a href="{{ asset('storage/file/' . $attachment->file) }}"
                                             target="_blank">{{ $attachment->file }}</a>
                                         <span class="ml-2 badge badge-warning">{{ $attachment->status }}</span>
                                     </td>

                                     <td>
                                         <b>Last Comment: </b>{{ ($attachment->comment) ? $attachment->comment : 'N/A' }}
                                     </td>

                                     <td class="text-right">
                                         <form id="del-{{ $attachment->id }}"
                                             action="{{ route('file.delete', $attachment) }}" method="POST">
                                             @csrf
                                             @method('PUT')
                                             <button class="btn btn-sm btn-danger" type="submit"
                                                 data-toggle="tooltip" data-placement="top" title="Delete Attachment"
                                                 onclick="deleteConfirmation('del-{{ $attachment->id }}'); return false;">Remove</button>
                                         </form>
                                     </td>
                                 </tr>
                             @empty
                             @endforelse
                         @endif
                     </tbody>
                 </table>
             </div>

             <div>
                 <span data-type='{{ $type }}' data-update="{{ isset($update) ? $update : '' }}"
                     class="btn_upload_modal btn btn-info">Upload</span>
             </div>
         </div>
           
            @if (isset($text))
                <p class="mt-3">{{ $text }}</p>
            @endif
         
     </div>
 </div>

 <hr>
 <!--  Single Attachment End -->
