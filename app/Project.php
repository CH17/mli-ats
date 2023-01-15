<?php

namespace App;

use App\User;
use App\Setting;
use Notification;
use App\Jobs\SendAssignmentEmail;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProjectMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\NextBusinessDate\GetNextBusinessDate;

class Project extends Model
{
    use Notifiable;
    protected $guarded = ['message'];

    protected $casts = [
        'has_loa'   => 'boolean',
        'is_ats_form_ready' => 'integer',
    ];

    public static function boot()
    {

        parent::boot();       

        self::saving(function ($model) {

            $setting = new Setting();
            $due_days = !empty($setting->getSetting('due_days')) ? $setting->getSetting('due_days') : 3;

            $get_next_business_date = new GetNextBusinessDate();
            $due_date = $get_next_business_date->dueBusinessDate($model->start_date, $due_days);
            $model->due_date = $due_date;
        });
    }

    /**
     * Project Approve
     */
    public function approve()
    {
        $this->update(['status' => 'Approved']);
    }

    /**
     * Project Approve
     */
    public function cancel()
    {
        $this->update(['status' => 'Canceled']);
    }

    /**
     * Project Approve
     */
    public function complete()
    {
        $this->update(['status' => 'Completed']);
    }
    public function setStatus($status)
    {
        if ($status == 5) {
            $data['status_active_at'] = now();
        }

        $data['status_id'] = $status;

        $this->update($data);
    }
    /**
     * Project Approve
     */
    public function assigned($data, $project)
    {

        $pre_managed_by = $project->managed_by;
        $pre_assigned_to = $project->assigned_to;
        $pre_used_by = $project->used_by;

        $this->update(['managed_by' => $data->managed_by, 'assigned_to' => $data->assigned_to, 'used_by' => $data->used_by]);

        $user_ids = array(
            $data->managed_by,
            $data->assigned_to,
            $data->used_by
        );


        if(!empty($data->managed_by) && ($pre_managed_by != $data->managed_by) ){
            $user = User::where('id', $data->managed_by)->first();
            $user_ids[] = $data->managed_by;

            $subject = 'You are assigned as Manager for ' . $project->activity_id ;
            dispatch(new SendAssignmentEmail($project, $subject, $user->email));

        }

        if(!empty($data->assigned_to) && ($pre_assigned_to != $data->assigned_to) ){
            $user = User::where('id', $data->assigned_to)->first();
            $user_ids[] = $data->assigned_to;

            $subject = 'You are assigned as Supervisor for ' . $project->activity_id ;
            dispatch(new SendAssignmentEmail($project, $subject, $user->email));
        }

        if(!empty($data->used_by) && ($pre_used_by != $data->used_by) ){
            $user = User::where('id', $data->used_by)->first();
            $user_ids[] = $data->used_by;

            $subject = 'You are assigned as Monitor for ' . $project->activity_id ;
            dispatch(new SendAssignmentEmail($project, $subject, $user->email));
        }

        $this->users()->sync($user_ids);
    }


    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }


    /**
     * managed_by
     */
    public function managedby()
    {
        return $this->belongsTo('App\User', 'managed_by');
    }

    /**
     * assigned_to
     */
    public function assignedto()
    {
        return $this->belongsTo('App\User', 'assigned_to');
    }

    /**
     * used_by
     */
    public function usedby()
    {
        return $this->belongsTo('App\User', 'used_by');
    }

    /**
     * used_by
     */
    public function activities()
    {
        return $this->hasMany('App\Activity', 'project_id')->with('project_user')->orderBy('updated_at', 'DESC');
    }

    /**
     * used_by
     */
    public function messages()
    {
        return $this->hasMany('App\Message', 'project_id')->orderBy('created_at', 'DESC')->with('user')->limit(5);
    }


    public function mli_fees()
    {
        return $this->hasMany('App\MliFee', 'activity_id');
    }

    public function audience_types()
    {
        return $this->belongsToMany('App\AudienceType', 'audience_type_projects');
    }

    public function accreditation_type_projects()
    {
        return $this->hasMany('App\CreditTypeProject', 'project_id');
    }

    public function accreditation_type_non_mli_projects()
    {
        return $this->hasMany('App\CreditTypeNonMliProject', 'project_id');
    }

    public function accreditation_types()
    {
        return $this->belongsToMany('App\CreditType', 'credit_type_projects');
    }

    public function accreditation_types_non_mli()
    {
        return $this->belongsToMany('App\CreditType', 'credit_type_non_mli_projects');
    }

    public function moc_boards()
    {
        return $this->belongsToMany('App\MocBoard', 'moc_board_projects');
    }

    public function moc_credit_types()
    {
        return $this->belongsToMany('App\MocCreditType', 'moc_credit_type_projects');
    }

    public function moc_practices()
    {
        return $this->belongsToMany('App\MocPractice', 'moc_practice_projects');
    }


    public function project_status()
    {
        return $this->belongsTo('App\ProjectStatus', 'status_id');
    }

    public function joint_provider()
    {
        return $this->belongsTo('App\JointProvider', 'jp_id');
    }

    public function joint_provider_2()
    {
        return $this->belongsTo('App\JointProvider', 'jp_id_2');
    }

    public function joint_provider_3()
    {
        return $this->belongsTo('App\JointProvider', 'jp_id_3');
    }

    public function jp_contact()
    {
        return $this->belongsTo('App\JpContact', 'jp_contact_id');
    }

    public function jp_contacts()
    {
        return $this->belongsToMany('App\JpContact', 'jp_contact_projects');
    }

    public function jp_contacts_2()
    {
        return $this->belongsToMany('App\JpContact', 'jp2_contact_projects');
    }

    public function jp_contacts_3()
    {
        return $this->belongsToMany('App\JpContact', 'jp3_contact_projects');
    }

    public function educational_partner_1()
    {
        return $this->belongsTo('App\EducationalPartner', 'ep_id_1');
    }

    public function ep_contacts_1()
    {
        return $this->belongsToMany('App\EpContact', 'ep1_contact_projects');
    }

    public function educational_partner_2()
    {
        return $this->belongsTo('App\EducationalPartner', 'ep_id_2');
    }


    public function ep_contacts_2()
    {
        return $this->belongsToMany('App\EpContact', 'ep2_contact_projects');
    }

    public function meta()
    {
        return $this->hasOne('App\ProjectMeta');
    }

    public function has_user($user)
    {
        return $this->users->contains($user);
    }

    public function notifyableusers()
    {
        return User::whereIn('id', [$this->managed_by, $this->assigned_to, $this->used_by])
            ->whereNotIn('id', [Auth::id()])
            ->orWhereHas('roles', function ($q) {
                $q->whereIn('name', ['ED', 'ADMIN']);
            })
            ->get();
    }

    public function files()
    {
        return $this->hasMany('App\File')->orderBy('type');
    }

}
