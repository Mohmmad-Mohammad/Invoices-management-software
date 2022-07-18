<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('permissions')->delete();
        $permissions = [
            'Permission.Invoices','Permission.ShowValidity',
            'Permission.PaidBills','Permission.BillingList',
            'Permission.PartiallyPaidInvoices','Permission.UnpaidBills',
            'Permission.InvoiceArchive','Permission.reports',
            'Permission.BillingReport','Permission.CustomerReport',
            'Permission.Users','Permission.UserList',
            'Permission.UserPermissions', 'Permission.AddValidity',
            'Permission.Settings','Permission.notifications',
            'Permission.AddInvoice','Permission.UpEXCEL',
            'Permission.InvoicePrinting','Permission.AddSection',
            'Permission.AddProduct', 'Permission.AddAttachment',
            'Permission.PermissionEdit','Permission.UserEdit',
            'Permission.EditSection', 'Permission.EditProduct',
            'Permission.PaymentStatusChange','Permission.InvoiceEdit',
            'Permission.InvoiceDelete','Permission.DeleteProduct',
            'Permission.ArchiveInvoice','Permission.DeleteSection',
            'Permission.UserDelete','Permission.DeleteAttachment',
            'Permission.PermissionDelete','Permission.Products',
            'Permission.Sections',
        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }


    }
}
