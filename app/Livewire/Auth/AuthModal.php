<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Masmerise\Toaster\Toastable;
use Masmerise\Toaster\Toaster;

class AuthModal extends Component
{
    use Toastable;
    public $showModal = false;
    public $isLogin = true;
    
    // Form fields
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    
    // UI state
    public $loading = false;
    
    protected function rules()
    {
        if ($this->isLogin) {
            return [
                'email' => 'required|email',
                'password' => 'required',
            ];
        }
        
        return [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ];
    }
    
    protected function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 2 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ];
    }
    
    public function toggleMode()
    {
        $this->isLogin = !$this->isLogin;
        $this->resetForm();
        $this->resetValidation();
    }
    
    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->loading = false;
    }
    
    public function login()
    {
        $this->loading = true;
        
        $this->validate();
        
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            
            $this->closeModal();
            
            // Redirect to intended page or dashboard
            return Redirect::route('home')->info('Login success');
        }
        
        $this->loading = false;
        $this->addError('email', 'Invalid email or password.');
    }
    
    public function signup()
    {
        $this->loading = true;
        
        $this->validate();
        
        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            
            // Automatically log in the user
            Auth::login($user);
            session()->regenerate();
            
            $this->closeModal();
            
            // Flash success message
            return Redirect::route('home')->info(message: 'Auth success');
            
        } catch (\Exception $e) {
            $this->loading = false;
            Toaster::warning('An error occurred while creating your account. Please try again.');
        }
    }
    
    public function submit()
    {
        if ($this->isLogin) {
            $this->login();
        } else {
            $this->signup();
        }
    }
    
    // Real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.auth.auth-modal');
    }

    public function closeModal(){
        $this->dispatch('closeModal');
    }
}