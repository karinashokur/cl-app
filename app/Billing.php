<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Billing extends Model
{
    protected $fillable = [
        'project_name', 'company_name', 'company_address', 'company_phone', 'company_email',
        'company_siret', 'customer_name', 'customer_email', 'customer_phone', 'customer_siret',
        'total_price', 'total_budget', 'billing_date'
    ];
}
