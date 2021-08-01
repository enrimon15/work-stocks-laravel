<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Filters\FilterCompanyFoundationYear;
use App\Models\Filters\FilterCompanyLocation;
use App\Models\Filters\FilterCompayEmployeesNumber;
use App\Models\Filters\FilterJobOfferExperienceYears;
use App\Models\Filters\FilterJobOfferLocation;
use App\Models\Filters\FilterJobOfferSalary;
use App\Models\Filters\FilterJobOfferSkills;
use Carbon\Carbon;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CompaniesController extends Controller
{
    public function companiesCatalog(Request $request)
    {
        try {
            $companies = QueryBuilder::for(Company::class)
                ->allowedFilters(['name',
                    AllowedFilter::custom('location', new FilterCompanyLocation()),
                    AllowedFilter::custom('foundation_year', new FilterCompanyFoundationYear()),
                    AllowedFilter::custom('employees_number', new FilterCompayEmployeesNumber())])
                ->paginate(10);

            if ($request->ajax()) {
                return view('company.company-search-data')
                    ->with('companies', $companies)
                    ->render();
            } else {

                $tagGroup = TagGroup::where('slug', '=', 'skill')->first();

                $tags = null;
                if ($tagGroup) {
                    $tags = Tag::where('tag_group_id', '=', $tagGroup->getAttribute('id'))
                        ->orderBy('count', 'desc')
                        ->limit(5)
                        ->get();
                }

                return view('company.company-search')
                    ->with('tags', $tags)
                    ->with('companies', $companies/*JobOffer::paginate(10)*/);
            }
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }
}
