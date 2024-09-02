<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \DB::table('users')->insert([
        //     'username' => 'administrator',
        //     'email' => 'kradjumli@gmail.com',
        //     'password' => bcrypt('123456789'),
        //     'role' => 'Administrator',
        //     'is_active' => 1,
        //     'email_verified_at' => '2024-05-15 08:46:33',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // \DB::table('user_profiles')->insert([
        //     'firstname' => 'Ra-ouf',
        //     'lastname' => 'Jumli',
        //     'middlename' => 'Indanan',
        //     'avatar' => 'avatar.jpg',
        //     'gender' => 'Male',
        //     'user_id' => 1,
        //     'mobile' => '09171531652',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
       
        $this->call(LocationRegionsTableSeeder::class);
        $this->call(LocationProvincesTableSeeder::class);
        $this->call(LocationMunicipalitiesTableSeeder::class);
        $this->call(LocationBarangaysTableSeeder::class);

        $this->call(ListMenusTableSeeder::class);
        $this->call(ListStatusesTableSeeder::class);
        $this->call(ListDropdownsTableSeeder::class);
        $this->call(ListRolesTableSeeder::class);
        $this->call(ListDiscountsTableSeeder::class);
        $this->call(ListLaboratoriesTableSeeder::class);
        
        $this->call(MembersTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(CsfQuestionsTableSeeder::class);
        
        $this->call(UsersTableSeeder::class);
        $this->call(UserProfilesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);

        $this->call(InventorySuppliersTableSeeder::class);
        // $this->call(ListServicesTableSeeder::class);
        // $this->call(InventoryItemsTableSeeder::class);
        // $this->call(InventoryStocksTableSeeder::class);
        // $this->call(InventoryWithdrawalsTableSeeder::class);
        $this->call(ListIndustriesTableSeeder::class);
        $this->call(CustomerNamesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CustomerContactsTableSeeder::class);
        $this->call(TestserviceNamesTableSeeder::class);
        $this->call(TestserviceMethodsTableSeeder::class);
        $this->call(TestservicesTableSeeder::class);
        $this->call(FinanceNamesTableSeeder::class);
        $this->call(TargetsTableSeeder::class);
        $this->call(TargetBreakdownsTableSeeder::class);
        $this->call(TestserviceAddonsTableSeeder::class);
        // $this->call(ConfigurationsTableSeeder::class);
        $this->call(CustomerConformesTableSeeder::class);

        
        $this->call(WalletsTableSeeder::class);
        $this->call(WalletTransactionsTableSeeder::class);
        $this->call(TsrsTableSeeder::class);
        $this->call(TsrPaymentsTableSeeder::class);
        $this->call(TsrPaymentDeductionsTableSeeder::class);
        $this->call(TsrSamplesTableSeeder::class);
        $this->call(TsrAnalysesTableSeeder::class);
        $this->call(TsrSampleReportsTableSeeder::class);
        $this->call(TsrServicesTableSeeder::class);
        $this->call(TsrReportsTableSeeder::class);
        
        $this->call(FinanceOrseriesTableSeeder::class);
        $this->call(FinanceOpsTableSeeder::class);
        $this->call(FinanceOpItemsTableSeeder::class);
        $this->call(FinanceReceiptsTableSeeder::class);
        $this->call(FinanceReceiptDetailsTableSeeder::class);
        
        $this->call(FinanceItemsTableSeeder::class);
        // $this->call(TsrGroupsTableSeeder::class);
        $this->call(TsrChildrenTableSeeder::class);
        $this->call(FinanceDepositsTableSeeder::class);
    }
}
